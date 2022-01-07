<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\UserToHobbyGroupDecompEntity;
use App\Entities\Database\Object\HobbyGroupObjectEntity;
use App\Entities\Full\HobbyGroupFullEntity;
use App\Models\Database\HobbyGroupDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToHobbyGroupDatabase;
use App\Models\Database\UserToRoleDatabase;

class HobbyGroupFacade
{
	private HobbyGroupDatabase $hobbyGroupDatabase;
	private UserFacade $userFacade;
	private UserToHobbyGroupDatabase $userToHobbyGroupDatabase;

	public function __construct(HobbyGroupDatabase $hobbyGroupDatabase, UserToHobbyGroupDatabase $userToHobbyGroupDatabase)
	{

		$this->hobbyGroupDatabase = $hobbyGroupDatabase;
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase());
		$this->userToHobbyGroupDatabase = $userToHobbyGroupDatabase;
	}

	public function saveHobbyGroup($formVariables): int
	{
		$students = $formVariables["students"];
		unset($formVariables["students"]);
		$hobbyGroupId = $this->hobbyGroupDatabase->save($formVariables);
		if ($students){
			foreach ($students as $student){
				$this->userToHobbyGroupDatabase->save([UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_USER_ID => $student, UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_GROUP_ID => $hobbyGroupId]);
			}

		}
		return $hobbyGroupId;
	}

	public function getAllHobbyGroups(): array
	{
		return $this->hobbyGroupDatabase->getAll();
	}

	public function getHobbyGroupById(int $id): HobbyGroupObjectEntity
	{
		return $this->hobbyGroupDatabase->getById($id);
	}
	public  function getAllStudentsForSelect(){
		return $this->userFacade->getAllStudents();
	}
	public function getFullHobbyGroup(int $id){
		$hobbyGroup =  $this->hobbyGroupDatabase->getById($id)->toArray();
		$students = $this->userToHobbyGroupDatabase->getWhere([UserToHobbyGroupDecompEntity::USER_TO_HOBBY_GROUP_HOBBY_GROUP_ID => $id]);
		$hobbyGroup[HobbyGroupFullEntity::HOBBYGROUP_STUDENTS] = $students;
		return HobbyGroupFullEntity::constructFromArray($hobbyGroup);
	}

}