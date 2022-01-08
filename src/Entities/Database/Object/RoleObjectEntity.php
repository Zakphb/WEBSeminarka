<?php

namespace App\Entities\Database\Object;

class RoleObjectEntity extends BaseObjectEntity
{
	const ROLE_NAME = "name";
	protected $name;

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::ROLE_NAME => $this->name
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