<?php

namespace App\Models\Database;

class RoleDatabase extends BaseDatabase
{
	const TABLE_NAME = "zakphb_role";
	const ENTITY_NAME = "RoleObjectEntity";
	const ROLE_STUDENT = 1;
	const ROLE_TEACHER_IN_WAITING = 2;
	const ROLE_TEACHER = 3;
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

	public function save($data)
	{
		return parent::save($data); // TODO: Change the autogenerated stub
	}

	public function update($data)
	{
		return parent::update($data); // TODO: Change the autogenerated stub
	}
}