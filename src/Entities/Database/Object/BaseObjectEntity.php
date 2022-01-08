<?php

namespace App\Entities\Database\Object;

abstract class BaseObjectEntity
{

	const BASE_ID = "id";
	public ?int $id;

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return array();
	}

}