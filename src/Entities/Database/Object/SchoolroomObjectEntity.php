<?php

namespace App\Entities\Database\Object;

class SchoolroomObjectEntity extends BaseObjectEntity
{
	const SCHOOLROOM_NAME = 'name';
	const SCHOOLROOM_TYPE_ID = 'type_id';


	protected $name;
	protected $type_id;

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::SCHOOLROOM_NAME => $this->name,
			self::SCHOOLROOM_TYPE_ID => $this->type_id,
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

	/**
	 * @return mixed
	 */
	public function getTypeId()
	{
		return $this->type_id;
	}


}