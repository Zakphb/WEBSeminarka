<?php

namespace App\Models\Facade;

use App\Entities\Database\Object\HobbyGroupObjectEntity;
use App\Models\Database\HobbyGroupDatabase;

class HobbyGroupFacade
{
	private HobbyGroupDatabase $hobbyGroupDatabase;

	public function __construct(HobbyGroupDatabase $hobbyGroupDatabase)
	{

		$this->hobbyGroupDatabase = $hobbyGroupDatabase;
	}

	public function saveHobbyGroup($formVariables): int
	{
		return $this->hobbyGroupDatabase->save($formVariables);
	}

	public function getAllHobbyGroups(): array
	{
		return $this->hobbyGroupDatabase->getAll();
	}

	public function getHobbyGroupById(int $id): HobbyGroupObjectEntity
	{
		return $this->hobbyGroupDatabase->getById($id);
	}
}