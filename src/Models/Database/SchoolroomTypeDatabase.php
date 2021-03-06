<?php

namespace App\Models\Database;

use App\Entities\Database\Object\BaseObjectEntity;
use App\Entities\Database\Object\SchoolroomTypeObjectEntity;

class SchoolroomTypeDatabase extends BaseDatabase
{

	const TABLE_NAME = "zakphb_schoolroom_type";
	const ENTITY_NAME = SchoolroomTypeObjectEntity::class;
	public function __construct()
	{
		parent::__construct(self::TABLE_NAME, self::ENTITY_NAME);
	}

	public function save($data): string
	{
		return parent::save($data); // TODO: Change the autogenerated stub
	}

	public function insert(array $data)
	{
		return parent::insert($data); // TODO: Change the autogenerated stub
	}

	public function update($data)
	{
		return parent::update($data); // TODO: Change the autogenerated stub
	}

	public function exists($data)
	{
		return parent::exists($data); // TODO: Change the autogenerated stub
	}

	public function deleteById($data)
	{
		return parent::deleteById($data); // TODO: Change the autogenerated stub
	}

	public function deleteWhere($data)
	{
		return parent::deleteWhere($data); // TODO: Change the autogenerated stub
	}

	public function getWhere($data, int $numberOfResults = 100)
	{
		return parent::getWhere($data, $numberOfResults); // TODO: Change the autogenerated stub
	}

	public function getById($data)
	{
		return parent::getById($data); // TODO: Change the autogenerated stub
	}

	public function getAll()
	{
		return parent::getAll(); // TODO: Change the autogenerated stub
	}

	public function getSelection(){
		$objectArray = $this->getAll();
		foreach ($objectArray as $object){
			$arr[$object->getId()] = $object->getName();
		}
		return $arr;
	}
}