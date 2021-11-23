<?php

namespace App\Entities\Full;

abstract class BaseFullEntity
{
	public function __construct()
	{
	}

	public function toArray(): array
	{
		return array();
	}

	public static function constructFromArray(array $params)
	{
		return null;
	}
}