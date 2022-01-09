<?php

namespace App\Entities\Full;

class SchoolroomFullEntity extends BaseFullEntity
{
	const SCHOOLROOM_NAME = 'name';
	const SCHOOLROOM_TYPE_ID = 'type_id';
	const SCHOOLROOM_TYPE = 'type';
	private $name;
	private $typeId;
	private $type;


	public function __construct($id, $name, $typeId, $type)
	{
		parent::__construct();
		$this->id = $id;
		$this->name = $name;
		$this->typeId = $typeId;
		$this->type = $type;
	}

	public static function constructFromArray(array $params)
	{
		return new SchoolroomFullEntity($params[self::BASE_ID], $params[self::SCHOOLROOM_NAME], $params[self::SCHOOLROOM_TYPE_ID], $params[self::SCHOOLROOM_TYPE]);
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::SCHOOLROOM_NAME => $this->name,
			self::SCHOOLROOM_TYPE_ID => $this->typeId,
			self::SCHOOLROOM_TYPE => $this->type
		];
	}

	/**
	 * @return int
	 */
	public function getId(): int
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
		return $this->typeId;
	}

	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type): void
	{
		$this->type = $type;
	}
}