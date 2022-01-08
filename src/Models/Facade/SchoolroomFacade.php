<?php

namespace App\Models\Facade;

use App\Entities\Database\Object\SchoolroomObjectEntity;
use App\Models\Database\SchoolroomDatabase;
use App\Models\Database\SchoolroomTypeDatabase;

/**
 *
 */
class SchoolroomFacade
{
	private SchoolroomDatabase $schoolroomDatabase;
	private SchoolroomTypeDatabase $schoolroomTypeDatabase;

	/**
	 * @param SchoolroomDatabase $schoolroomDatabase
	 * @param SchoolroomTypeDatabase $schoolroomTypeDatabase
	 */
	public function __construct(SchoolroomDatabase $schoolroomDatabase, SchoolroomTypeDatabase $schoolroomTypeDatabase)
	{
		$this->schoolroomDatabase = $schoolroomDatabase;
		$this->schoolroomTypeDatabase = $schoolroomTypeDatabase;
	}

	/**
	 * @param $formVariables
	 * @return string
	 */
	public function saveSchoolroom($formVariables):string
	{
		return $this->schoolroomDatabase->save($formVariables);
	}

	/**
	 * @return array
	 */
	public function getAllSchoolrooms(): array
	{
		return $this->schoolroomDatabase->getAll();
	}

	/**
	 * @param int $id
	 * @return SchoolroomObjectEntity
	 */
	public function getSchoolroomById(int $id): SchoolroomObjectEntity
	{
		return $this->schoolroomDatabase->getById($id);
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deleteSchoolroomById(int $id): bool{
		return $this->schoolroomDatabase->deleteById($id);
	}

	/**
	 * @return array
	 */
	public function getTypeNamesForSelect(): array
	{
		return $this->schoolroomTypeDatabase->getSelection();
	}
}