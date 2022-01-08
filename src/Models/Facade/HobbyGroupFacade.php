<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\UserToHobbyGroupDecompEntity;
use App\Entities\Database\Object\BaseObjectEntity;
use App\Entities\Database\Object\HobbyGroupObjectEntity;
use App\Entities\Full\HobbyGroupFullEntity;
use App\Models\Database\HobbyGroupDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToHobbyGroupDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Database\UserToScheduleDatabase;
use App\Utilities\UploadUtils;

/**
 *
 */
class HobbyGroupFacade
{
	private HobbyGroupDatabase $hobbyGroupDatabase;
	private UserFacade $userFacade;
	private UserToHobbyGroupDatabase $userToHobbyGroupDatabase;

	/**
	 * @param HobbyGroupDatabase $hobbyGroupDatabase
	 * @param UserToHobbyGroupDatabase $userToHobbyGroupDatabase
	 */
	public function __construct(HobbyGroupDatabase $hobbyGroupDatabase, UserToHobbyGroupDatabase $userToHobbyGroupDatabase)
	{

		$this->hobbyGroupDatabase = $hobbyGroupDatabase;
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase(), new UserToScheduleDatabase());
		$this->userToHobbyGroupDatabase = $userToHobbyGroupDatabase;
	}

	/**
	 * @param $formVariables
	 * @return int
	 */
	public function saveHobbyGroup($formVariables): int
	{
		$file = $formVariables['files']['image'];
		$students = $formVariables["students"];
		unset($formVariables["students"], $formVariables['files']);
		$hobbyGroupId = $this->hobbyGroupDatabase->save($formVariables);
		$hobbyGroup = $this->getHobbyGroupById($hobbyGroupId);
		$imagePath = UploadUtils::upload($file, $hobbyGroup->getId(), $formVariables['name'], $hobbyGroup->getImage());
		$this->hobbyGroupDatabase->update([BaseObjectEntity::BASE_ID => $hobbyGroupId, HobbyGroupObjectEntity::HOBBYGROUP_IMAGE => $imagePath]);
		if ($students && $hobbyGroupId)
		{
			foreach ($students as $student)
			{
				$this->userToHobbyGroupDatabase->decompTableSave([UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_USER_ID => $student, UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_GROUP_ID => $hobbyGroupId]);
			}

		}
		return $hobbyGroupId;
	}

	/**
	 * @return array
	 */
	public function getAllHobbyGroups(): array
	{
		return $this->hobbyGroupDatabase->getAll();
	}

	/**
	 * @param int $id
	 * @return HobbyGroupObjectEntity
	 */
	public function getHobbyGroupById(int $id): HobbyGroupObjectEntity
	{
		return $this->hobbyGroupDatabase->getById($id);
	}

	/**
	 * @return array
	 */
	public function getAllStudentsForSelect()
	{
		return $this->userFacade->getAllStudents();
	}

	/**
	 * @param int $id
	 * @return HobbyGroupFullEntity
	 */
	public function getFullHobbyGroup(int $id)
	{
		$hobbyGroup = $this->hobbyGroupDatabase->getById($id)->toArray();
		$students = $this->userToHobbyGroupDatabase->getWhere([UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_GROUP_ID => $id]);
		$hobbyGroup[HobbyGroupFullEntity::HOBBYGROUP_STUDENTS] = $students;
		return HobbyGroupFullEntity::constructFromArray($hobbyGroup);
	}

}