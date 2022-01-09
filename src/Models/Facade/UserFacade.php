<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\UserToHobbyGroupDecompEntity;
use App\Entities\Database\Decomp\UserToRoleDecompEntity;
use App\Entities\Database\Decomp\UserToScheduleDecompEntity;
use App\Entities\Database\Object\BaseObjectEntity;
use App\Entities\Database\Object\UserObjectEntity;
use App\Entities\Full\RoleFullEntity;
use App\Entities\Full\UserFullEntity;
use App\Entities\Full\UserScheduleFullEntity;
use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\RoleToPermissionDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToHobbyGroupDatabase;
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
	private UserToHobbyGroupDatabase $userToHobbyGroupDatabase;

	/**
	 * @param UserDatabase $userDatabase
	 * @param UserToRoleDatabase $userToRoleDatabase
	 * @param UserToScheduleDatabase $userToScheduleDatabase
	 */
	public function __construct(UserDatabase $userDatabase, UserToRoleDatabase $userToRoleDatabase, UserToScheduleDatabase $userToScheduleDatabase, UserToHobbyGroupDatabase $userToHobbyGroupDatabase)
	{
		$this->userDatabase = $userDatabase;
		$this->userToRoleDatabase = $userToRoleDatabase;
		$this->roleFacade = new RoleFacade(new RoleDatabase(), new RoleToPermissionDatabase(), new PermissionDatabase());
		$this->userToScheduleDatabase = $userToScheduleDatabase;
		$this->userToHobbyGroupDatabase = $userToHobbyGroupDatabase;
	}

	/**
	 * @param $formValues
	 * @return Response
	 */
	public function register($formValues): Response
	{
		$formValues[UserFullEntity::USER_PASSWORD] = $this->hashPassword($formValues[UserFullEntity::USER_PASSWORD]);
		$userEntity = $formValues;
		if ($this->doUserExistAlready($userEntity))
		{
			return new Response(false, "Uživatel jiz existuje.");
		}
		$userInserted = $this->userDatabase->save($userEntity);
		$roleInserted = $this->userToRoleDatabase->save([UserToRoleDecompEntity::USER_TO_ROLE_USER_ID => $userInserted, UserToRoleDecompEntity::USER_TO_ROLE_ROLE_ID => RoleDatabase::ROLE_STUDENT]);
		if ($roleInserted !== false && $userInserted !== false)
		{
			return new Response(true, "Registrace proběhla úspěšně.");
		}
		return new Response(false, "Při registraci došlo k chybě, zkuste to znovu.");
	}

	/**
	 * @param $user
	 * @return bool
	 */
	public function doUserExistAlready($user)
	{
		unset($user[UserFullEntity::USER_PASSWORD], $user[UserFullEntity::USER_ID], $user[UserFullEntity::USER_ROLE]);
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
		$userData = $formValues;
		$userFromDatabase = $this->userDatabase->getUser($userData[UserFullEntity::USER_EMAIL]);
		if ($userFromDatabase === null)
		{
			return new Response(false, "Zadaný uživatel neexistuje.");
		}
		if (password_verify($userData[UserFullEntity::USER_PASSWORD], $userFromDatabase->getPassword()))
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
		$user = $this->userDatabase->getById($id);
		return $this->fullUser($user);
	}

	/**
	 * @param UserObjectEntity $user
	 * @return UserFullEntity
	 */
	private function fullUser(UserObjectEntity $user)
	{
		$fullRole = $this->getFullRoleWithPermissions($user->getId());
		$userArray = $user->toArray();
		$userArray[UserFullEntity::USER_ROLE] = $fullRole;
		unset($userArray[UserObjectEntity::USER_PASSWORD]);
		return UserFullEntity::constructFromArray($userArray);
	}

	/**
	 * @param UserObjectEntity $userObject
	 * @return UserFullEntity
	 */
	public function getFullUserFromUserObject(UserObjectEntity $userObject)
	{
		return $this->fullUser($userObject);
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
		$this->userToRoleDatabase->decompTableRole($userToRoleArray);
		return $this->userDatabase->save($formValues);
	}

	/**
	 *
	 */
	public function getAllTeachers()
	{
		$gridTeachers = [];
		$users = $this->userDatabase->getAll();
		foreach ($users as $user)
		{
			$teacher = $this->getFullUserFromUserObject($user);
			if ($teacher->getRole()->getName() === "teacher")
			{
				$gridTeachers[] = $teacher;
			}
		}
		return $gridTeachers;
	}

	/**
	 * @param $data
	 * @return string|void
	 */
	public function saveTeacher($data)
	{
		return $this->userToScheduleDatabase->decompTableSave($data);
	}

	/**
	 * @param $scheduleId
	 * @return UserFullEntity|void
	 */
	public function getRelatedTeacher($scheduleId)
	{
		$UtSDecompEntities = $this->userToScheduleDatabase->getWhere([UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $scheduleId]);
		foreach ($UtSDecompEntities as $utSDecompEntity)
		{
			$user = $this->getFullUser($utSDecompEntity->user_id);
			if ($user->getRole()->getName() === 'teacher')
			{
				return $user;
			}
		}
	}

	/**
	 * @param $scheduleId
	 * @param $userId
	 */
	public function isAllowed($scheduleId, $userId)
	{
		$arr = [];
		$utSchedule = $this->userToScheduleDatabase->getWhere([UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $scheduleId, UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID => $userId]);
		if ($utSchedule)
		{
			$arr[UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_LOGGED_IN] = $utSchedule[0]->is_logged_in;
			if ($utSchedule[0]->is_allowed)
			{
				$arr[UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_ALLOWED] = $utSchedule[0]->is_allowed;
				return $arr;
			}
			$arr[UserToScheduleDecompEntity::USER_TO_SCHEDULE_NOT_ALLOWED_NOTE] = $utSchedule[0]->not_allowed_note;
			$arr[UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_ALLOWED] = $utSchedule[0]->is_allowed;
			return $arr;
		}
		return null;
	}

	/**
	 * @param $userId
	 * @return array|false
	 */
	public function getRelatedSchedules($userId)
	{
		return $this->userToScheduleDatabase->getWhere([UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID => $userId]);
	}

	/**
	 * @param $userId
	 * @param $scheduleId
	 * @return string|void
	 */
	public function joinSchedule($userId, $scheduleId)
	{
		return $this->userToScheduleDatabase->decompTableSave([UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID => $userId, UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $scheduleId, UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_LOGGED_IN => TRUE]);
	}

	/**
	 * @param $scheduleId
	 * @return int
	 */
	public function getOccupancyOfSchedule($scheduleId)
	{
		$schedules = $this->userToScheduleDatabase->getWhere([UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $scheduleId, UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_LOGGED_IN => TRUE, UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_ALLOWED => TRUE]);
		return count($schedules);
	}

	/**
	 * @param $scheduleId
	 * @return array
	 */
	public function getRelatedStudents($scheduleId)
	{
		$scheduleRecords = $this->userToScheduleDatabase->getWhere([UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $scheduleId]);
		$students = [];
		foreach ($scheduleRecords as $scheduleRecord)
		{
			if ($scheduleRecord->is_logged_in == true)
			{
				$user = $this->getFullUser($scheduleRecord->user_id)->toArray();
				$user[UserToScheduleDecompEntity::USER_TO_SCHEDULE_IS_ALLOWED] = $scheduleRecord->is_allowed;
				$user[UserToScheduleDecompEntity::USER_TO_SCHEDULE_NOT_ALLOWED_NOTE] = $scheduleRecord->not_allowed_note;
				$students[] = UserScheduleFullEntity::constructFromArray($user);
			}
		}
		return $students;
	}

	/**
	 * @param $values
	 * @return bool
	 */
	public function saveAllowance($values)
	{
		$UtSchedule = $this->userToScheduleDatabase->getWhere([UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID => $values[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID], UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $values[UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID]])[0];
		$values[BaseObjectEntity::BASE_ID] = $UtSchedule->id;
		$hobbygroupId = $values[UserScheduleFullEntity::USER_HOBBYGROUP_ID];
		unset($values[UserScheduleFullEntity::USER_HOBBYGROUP_ID]);
		if ($values[UserScheduleFullEntity::USER_IS_ALLOWED])
		{
			$this->userToHobbyGroupDatabase->decompTableSave([UserScheduleFullEntity::USER_HOBBYGROUP_ID => $hobbygroupId, UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_USER_ID => $values[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID]], TRUE);
		} else
		{
			$this->userToHobbyGroupDatabase->deleteWhere([UserScheduleFullEntity::USER_HOBBYGROUP_ID => $hobbygroupId, UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_USER_ID => $values[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID]]);
		}
		return $this->userToScheduleDatabase->update($values);
	}


}