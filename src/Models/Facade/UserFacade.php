<?php

namespace App\Models\Facade;

use App\Entities\LoginFormEntity;
use App\Entities\RegisterFormEntity;
use App\Entities\UserEntity;
use App\Entities\UserToRoleEntity;
use App\Models\Database\RoleDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Utilities\Login;
use App\Utilities\Response;

class UserFacade
{
	private UserDatabase $userDatabase;
	private UserToRoleDatabase $userToRoleDatabase;

	public function __construct(UserDatabase $userDatabase, UserToRoleDatabase $userToRoleDatabase)
	{
		$this->userDatabase = $userDatabase;
		$this->userToRoleDatabase = $userToRoleDatabase;
	}


	public function register($formValues): Response
	{
		$formValues[RegisterFormEntity::REGISTER_PASSWORD] = $this->hashPassword($formValues[RegisterFormEntity::REGISTER_PASSWORD]);
		$registerFormEntity = $this->mapRegisterFormValuesToObject($formValues);
		$userEntity = $this->mapRegisterFormEntityToUserEntity($registerFormEntity);
		if ($this->doUserExistAlready($userEntity))
		{
			return new Response(false, "Uživatel jiz existuje.");
		}
		$userInserted = $this->userDatabase->save($userEntity->toArray());
		if ($registerFormEntity->toArray()[RegisterFormEntity::REGISTER_TEACHER])
		{
			$roleInserted = $this->userToRoleDatabase->save([UserToRoleEntity::USER_TO_ROLE_USER_ID => $userInserted, UserToRoleEntity::USER_TO_ROLE_ROLE_ID => RoleDatabase::ROLE_TEACHER_IN_WAITING]);
		} else
		{
			$roleInserted = $this->userToRoleDatabase->save([UserToRoleEntity::USER_TO_ROLE_USER_ID => $userInserted, UserToRoleEntity::USER_TO_ROLE_ROLE_ID => RoleDatabase::ROLE_STUDENT]);
		}
		if ($roleInserted !== false && $userInserted !== false)
		{
			return new Response(true, "Registrace proběhla úspěšně.");
		}
		return new Response(false, "Při registraci došlo k chybě, zkuste to znovu.");
	}

	public function doUserExistAlready(UserEntity $userEntity)
	{
		$user = $userEntity->toArray();
		unset($user[UserEntity::USER_PASSWORD], $user[UserEntity::USER_ID]);
		$user = $this->userDatabase->getWhere($userEntity->toArray(), 1);
		if (empty($user))
		{
			return false;
		}
		return true;
	}

	public function login($formValues, Login $user): Response
	{
		$loginFormEntity = $this->mapLoginFormValuesToObject($formValues);
		$userFromDatabase = $this->userDatabase->getUser($loginFormEntity->getEmail());
		if (empty($userFromDatabase))
		{
			return new Response(false, "Zadaný uživatel neexistuje.");
		}
		if (password_verify($loginFormEntity->getPassword(), $userFromDatabase[UserEntity::USER_PASSWORD]))
		{
			$user->login($userFromDatabase[UserEntity::USER_ID]);
			return new Response(true, "Přihlášení proběhlo úspěšně");
		}
		return new Response(false, "Uživatele se nepovedlo přihlásit, máte správné heslo ?");
	}

	public function getFullUser(int $id){
		return $this->userDatabase->getById($id);
	}

	private function hashPassword($pass)
	{
		$pass = trim($pass);
		return trim(password_hash($pass, PASSWORD_DEFAULT));
	}

	private function mapRegisterFormValuesToObject($formValues)
	{
		return RegisterFormEntity::constructFromArray($formValues);
	}

	private function mapLoginFormValuesToObject($formValues)
	{
		return LoginFormEntity::constructFromArray($formValues);
	}

	private function mapRegisterFormEntityToUserEntity(RegisterFormEntity $registerFormEntity): UserEntity
	{
		$registerFormEntityArray = $registerFormEntity->toArray();
		if (isset($registerFormEntityArray[RegisterFormEntity::REGISTER_TEACHER]))
		{
			unset($registerFormEntityArray[RegisterFormEntity::REGISTER_TEACHER]);
		}
		return UserEntity::constructFromArray($registerFormEntityArray);
	}


}