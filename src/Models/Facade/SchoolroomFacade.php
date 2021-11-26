<?php

namespace App\Models\Facade;

use App\Entities\Database\Object\SchoolroomObjectEntity;
use App\Models\Database\SchoolroomDatabase;

class SchoolroomFacade
{
	private SchoolroomDatabase $schoolroomDatabase;

	public function __construct(SchoolroomDatabase $schoolroomDatabase)
	{
		$this->schoolroomDatabase = $schoolroomDatabase;
	}

	public function saveSchoolroom($formVariables):string
	{
		return $this->schoolroomDatabase->save($formVariables);
	}

	public function getAllSchoolrooms(): array
	{
		return $this->schoolroomDatabase->getAll();
	}

	public function getSchoolroomById(int $id): SchoolroomObjectEntity
	{
		return $this->schoolroomDatabase->getById($id);
	}

	public function deleteSchoolroomById(int $id): bool{
		return $this->schoolroomDatabase->deleteById($id);
	}

	public function getTypeNamesForSelect(): array
	{
		$arr = [];
		$count = count(SchoolroomObjectEntity::TYPE_KEYS);
		for ($i = 0; $i < $count; $i++)
		{
			$arr[SchoolroomObjectEntity::TYPE_KEYS[$i]] = SchoolroomObjectEntity::TYPE_NAMES[$i];
		}
		return $arr;
	}
}