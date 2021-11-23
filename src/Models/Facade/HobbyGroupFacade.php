<?php

namespace App\Models\Facade;

use App\Models\Database\HobbyGroupDatabase;

class HobbyGroupFacade
{
	private HobbyGroupDatabase $hobbyGroupDatabase;

	public function __construct(HobbyGroupDatabase $hobbyGroupDatabase)
	{

		$this->hobbyGroupDatabase = $hobbyGroupDatabase;
	}

	public function saveHobbyGroup($formVariables){
		$this->hobbyGroupDatabase->save($formVariables);
	}

	public function getAllHobbyGroups(){
		return $this->hobbyGroupDatabase->getAll();
	}

	public function getHobbyGroupById(int $id){
		return $this->hobbyGroupDatabase->getById($id);
	}
}