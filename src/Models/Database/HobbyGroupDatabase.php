<?php

namespace App\Models\Database;

class HobbyGroupDatabase extends BaseDatabase
{
	const TABLE_NAME = "zakphb_hobby_group";
	public function __construct()
	{
		parent::__construct(self::TABLE_NAME);
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