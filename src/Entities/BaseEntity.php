<?php

namespace App\Entities;

abstract class BaseEntity
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