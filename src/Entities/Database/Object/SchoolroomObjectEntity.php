<?php

namespace App\Entities\Database\Object;

class SchoolroomObjectEntity extends BaseObjectEntity
{
	const SCHOOLROOM_NAME = 'name';
	const SCHOOLROOM_TYPE = 'type';
	const TYPE_CLASSROOM = 'classroom';
	const TYPE_GYM = 'gym';
	const TYPE_WORKSHOP = 'workshop';
	const NAME_WORKSHOP = 'Dílny';
	const NAME_GYM = 'Tělocvična';
	const NAME_CLASSROOM = 'Třída';
	const COLUMN_NAMES = [
		self::BASE_ID,
		self::SCHOOLROOM_NAME,
		self::SCHOOLROOM_TYPE,
	];
	//TYPE MUSI BYT VE STEJNEM PORADI!!!!
	const TYPE_KEYS = [
		self::TYPE_CLASSROOM,
		self::TYPE_GYM,
		self::TYPE_WORKSHOP
	];
	const TYPE_NAMES = [
		self::NAME_CLASSROOM,
		self::NAME_GYM,
		self::NAME_WORKSHOP
	];

	protected $name;
	protected $type;

	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::SCHOOLROOM_NAME => $this->name,
			self::SCHOOLROOM_TYPE => $this->type,
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
	public function getType()
	{
		return $this->type;
	}


}