<?php

namespace App\Entities\Full;

class HobbyGroupFullEntity extends BaseFullEntity
{
	const HOBBYGROUP_IMAGE = 'image';
	const HOBBYGROUP_NAME = 'name';
	const HOBBYGROUP_DESCRIPTION = 'description';
	const HOBBYGROUP_PRICE = 'price';
	const HOBBYGROUP_CAPACITY = 'capacity';
	const HOBBYGROUP_STUDENTS = 'students';

	const COLUMN_NAMES = [
		self::BASE_ID,
		self::HOBBYGROUP_IMAGE,
		self::HOBBYGROUP_NAME,
		self::HOBBYGROUP_DESCRIPTION,
		self::HOBBYGROUP_PRICE,
		self::HOBBYGROUP_CAPACITY,
		self::HOBBYGROUP_STUDENTS
	];

	public static function constructFromArray(array $params)
	{
		$hobbyGroup = new HobbyGroupFullEntity();
		foreach ($params as $key => $value)
		{
			$hobbyGroup->$key = $value;
		}
		return $hobbyGroup;
	}



}