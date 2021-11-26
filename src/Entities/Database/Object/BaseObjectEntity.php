<?php

namespace App\Entities\Database\Object;

abstract class BaseObjectEntity
{
	const BASE_ID = "id";
	protected ?int $id;

	public function toArray(): array
	{
		return array();
	}


}