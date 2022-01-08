<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\UserToRoleDecompEntity;
use App\Entities\Database\Object\BaseObjectEntity;
use App\Entities\Database\Object\UserObjectEntity;
use App\Entities\Full\RoleFullEntity;
use App\Entities\Full\UserFullEntity;
use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\RoleToPermissionDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Database\UserToScheduleDatabase;
use App\Utilities\Login;
use App\Utilities\Response;

/**
 *
 */
class UserFacade
{
	private UserDatabase $userDatabase;
	private UserToRoleDatabase $userToRoleDatabase;
	private RoleFacade $roleFacade;
	private UserToScheduleDatabase $userToScheduleDatabase;

	/**
	 * @param UserDatabase $userDatabase
	 * @param UserToRoleDatabase $userToRoleDatabase
	 * @param UserToScheduleDatabase $userToScheduleDatabase
	 */
	public function __construct(UserDatabase $userDatabase, UserToRoleDatabase $userToRoleDatabase, UserToScheduleDatabase $userToScheduleDatabase)
	{
		$this->userDatabase = $userDatabase;
		$this->userToRoleDatabase = $userToRoleDatabase;
		$this->roleFacade = new RoleFacade(new RoleDatabase(), new RoleToPermissionDatabase(), new PermissionDatabase());
		$this->userToScheduleDatabase = $userToScheduleDatabase;
	}

	/**
	 * @param $formValues
	 * @return Response
	 */
	public function register($formValues): Response
	{
		$formValues[UserFullEntity::USER_PASSWORD] = $this->hashPassword($formValues[UserFullEntity::USER_PASSWORD]);
		$userEntity = $this->mapFormDataToUserEntity($formValues);
		if ($this->doUserExistAlready($userEntity))
		{
			return new Response(false, "Uživatel jiz existuje.");
		}
		$userEntity = $userEntity->toArray();
		$teacher = $userEntity[UserFullEntity::USER_TEACHER];
		unset($userEntity[UserFullEntity::USER_TEACHER], $userEntity[UserFullEntity::USER_ROLE]);
		$userInserted = $this->userDatabase->save($userEntity);
		if ($teacher)
		{
			$roleInserted = $this->userToRoleDatabase->save([UserToRoleDecompEntity::USER_TO_ROLE_USER_ID => $userInserted, UserToRoleDecompEntity::USER_TO_ROLE_ROLE_ID => RoleDatabase::ROLE_TEACHER_IN_WAITING]);
		} else
		{
			$roleInserted = $this->userToRoleDatabase->save([UserToRoleDecompEntity::USER_TO_ROLE_USER_ID => $userInserted, UserToRoleDecompEntity::USER_TO_ROLE_ROLE_ID => RoleDatabase::ROLE_STUDENT]);
		}
		if ($roleInserted !== false && $userInserted !== false)
		{
			return new Response(true, "Registrace proběhla úspěšně.");
		}
		return new Response(false, "Při registraci došlo k chybě, zkuste to znovu.");
	}

	/**
	 * @param UserFullEntity $userEntity
	 * @return bool
	 */
	public function doUserExistAlready(UserFullEntity $userEntity)
	{
		$user = $userEntity->toArray();
		unset($user[UserFullEntity::USER_PASSWORD], $user[UserFullEntity::USER_ID], $user[UserFullEntity::USER_ROLE], $user[UserFullEntity::USER_TEACHER]);
		$user = $this->userDatabase->getWhere($user, 1);
		if (empty($user))
		{
			return false;
		}
		return true;
	}

	/**
	 * @param $formValues
	 * @param Login $user
	 * @return Response
	 */
	public function login($formValues, Login $user): Response
	{
		$userEntity = $this->mapFormDataToUserEntity($formValues);
		$userFromDatabase = $this->userDatabase->getUser($userEntity->getEmail());
		if ($userFromDatabase === null)
		{
			return new Response(false, "Zadaný uživatel neexistuje.");
		}
		if (password_verify($userEntity->getPassword(), $userFromDatabase->getPassword()))
		{
			$user->login($userFromDatabase->getId());
			return new Response(true, "Přihlášení proběhlo úspěšně");
		}
		return new Response(false, "Uživatele se nepovedlo přihlásit, máte správné heslo ?");
	}

	/**
	 * @param int $id
	 * @return UserFullEntity
	 */
	public function getFullUser(int $id)
	{
		$fullRole = $this->getFullRoleWithPermissions($id);
		$user = $this->userDatabase->getById($id);
		$fullUser = UserFullEntity::constructFromArray($user->toArray());
		$fullUser->setRole($fullRole);
		return $fullUser;

	}

	/**
	 * @param UserObjectEntity $userObject
	 * @return UserFullEntity
	 */
	public function getFullUserFromUserObject(UserObjectEntity $userObject)
	{
		$fullRole = $this->getFullRoleWithPermissions($userObject->getId());
		$fullUser = UserFullEntity::constructFromArray($userObject->toArray());
		$fullUser->setRole($fullRole);
		return $fullUser;
	}

	/**
	 * @return array
	 */
	public function getAllUsers()
	{
		$gridUsers = [];
		$users = $this->userDatabase->getAll();
		foreach ($users as $user)
		{
			$gridUsers[] = $this->getFullUserFromUserObject($user);
		}
		return $gridUsers;
	}

	/**
	 * @return array
	 */
	public function getAllStudents()
	{
		$gridStudents = [];
		$users = $this->userDatabase->getAll();
		foreach ($users as $user)
		{
			$student = $this->getFullUserFromUserObject($user);
			if ($student->getRole()->getName() === "student")
			{
				$gridStudents[] = $student;
			}
		}
		return $gridStudents;
	}

	/**
	 * @param $formData
	 * @return UserFullEntity
	 */
	public function mapFormDataToUserEntity($formData)
	{
		return UserFullEntity::constructFromArray($formData);
	}

	/**
	 * @param $pass
	 * @return string
	 */
	private function hashPassword($pass)
	{
		$pass = trim($pass);
		return trim(password_hash($pass, PASSWORD_DEFAULT));
	}

	/**
	 * @param $userId
	 * @return RoleFullEntity
	 */
	public function getFullRoleWithPermissions($userId): RoleFullEntity
	{
		$data = [UserToRoleDecompEntity::USER_TO_ROLE_USER_ID => $userId];
		$role = $this->userToRoleDatabase->getWhere($data, 1);
		return $this->roleFacade->getFullRoleWithPermissions($role[0]->role_id);
	}

	/**
	 * @param $formValues
	 * @return string
	 */
	public function saveUser($formValues)
	{
		$roleId = $formValues[UserFullEntity::USER_ROLE];
		unset($formValues[UserFullEntity::USER_ROLE]);
		$userToRoleArray = [UserToRoleDecompEntity::USER_TO_ROLE_USER_ID => $formValues[BaseObjectEntity::BASE_ID], UserToRoleDecompEntity::USER_TO_ROLE_ROLE_ID => $roleId];
		$this->userToRoleDatabase->decompTableSave($userToRoleArray, TRUE);
		return $this->userDatabase->save($formValues);
	}


}