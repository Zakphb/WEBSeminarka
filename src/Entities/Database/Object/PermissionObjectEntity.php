<?php

namespace App\Entities\Database\Object;

class PermissionObjectEntity extends BaseObjectEntity
{
	const PERMISSION_NAME = "name";
	protected $name;

	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::PERMISSION_NAME => $this->name
		];
	}

	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

}