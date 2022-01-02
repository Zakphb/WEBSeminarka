<?php

namespace App\Models\Facade;

use App\Entities\Database\Object\SchoolroomObjectEntity;
use App\Models\Database\SchoolroomDatabase;
use App\Models\Database\SchoolroomTypeDatabase;

class SchoolroomFacade
{
	private SchoolroomDatabase $schoolroomDatabase;
	private SchoolroomTypeDatabase $schoolroomTypeDatabase;

	public function __construct(SchoolroomDatabase $schoolroomDatabase, SchoolroomTypeDatabase $schoolroomTypeDatabase)
	{
		$this->schoolroomDatabase = $schoolroomDatabase;
		$this->schoolroomTypeDatabase = $schoolroomTypeDatabase;
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
		return $this->schoolroomTypeDatabase->getSelection();
	}
}