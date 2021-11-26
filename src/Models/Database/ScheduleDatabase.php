<?php

namespace App\Models\Database;

use App\Entities\Database\Object\ScheduleObjectEntity;

class ScheduleDatabase extends BaseDatabase
{
	const TABLE_NAME = "zakphb_schedule";
	const ENTITY_NAME = ScheduleObjectEntity::class;
	public function __construct()
	{
		parent::__construct(self::TABLE_NAME, self::ENTITY_NAME);
	}

	public function exists($data)
	{
		return parent::exists($data); // TODO: Change the autogenerated stub
	}

	public function insert($data)
	{
		return parent::insert($data); // TODO: Change the autogenerated stub
	}

	public function save($data):string
	{
		return parent::save($data); // TODO: Change the autogenerated stub
	}

	public function update($data)
	{
		return parent::update($data); // TODO: Change the autogenerated stub
	}
}