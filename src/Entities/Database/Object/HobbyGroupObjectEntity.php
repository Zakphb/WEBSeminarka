<?php

namespace App\Entities\Database\Object;

class HobbyGroupObjectEntity extends BaseObjectEntity
{
	const HOBBYGROUP_IMAGE = 'image';
	const HOBBYGROUP_NAME = 'name';
	const HOBBYGROUP_DESCRIPTION = 'description';
	const HOBBYGROUP_PRICE = 'price';
	const HOBBYGROUP_CAPACITY = 'capacity';

	const COLUMN_NAMES = [
		self::BASE_ID,
		self::HOBBYGROUP_IMAGE,
		self::HOBBYGROUP_NAME,
		self::HOBBYGROUP_DESCRIPTION,
		self::HOBBYGROUP_PRICE,
		self::HOBBYGROUP_CAPACITY
	];


	protected $image;
	protected $name;
	protected $description;
	protected $price;
	protected $capacity;


	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::HOBBYGROUP_IMAGE => $this->image,
			self::HOBBYGROUP_NAME => $this->name,
			self::HOBBYGROUP_DESCRIPTION => $this->description,
			self::HOBBYGROUP_PRICE => $this->price,
			self::HOBBYGROUP_CAPACITY => $this->capacity
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
	 * @param int|null $id
	 */
	public function setId(?int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * @param mixed $image
	 */
	public function setImage($image): void
	{
		$this->image = $image;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description): void
	{
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice($price): void
	{
		$this->price = $price;
	}

	/**
	 * @return mixed
	 */
	public function getCapacity()
	{
		return $this->capacity;
	}

	/**
	 * @param mixed $capacity
	 */
	public function setCapacity($capacity): void
	{
		$this->capacity = $capacity;
	}

//	public static function constructFromArray(array $params): HobbyGroupObjectEntity
//	{
//		return new HobbyGroupObjectEntity($params[self::BASE_ID] ?: null, $params[self::HOBBYGROUP_IMAGE], $params[self::HOBBYGROUP_NAME], $params[self::HOBBYGROUP_DESCRIPTION], $params[self::HOBBYGROUP_PRICE], $params[self::HOBBYGROUP_CAPACITY]);
//	}
}