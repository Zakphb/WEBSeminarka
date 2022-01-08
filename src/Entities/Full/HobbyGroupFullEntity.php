<?php

namespace App\Entities\Full;

class HobbyGroupFullEntity extends BaseFullEntity
{
	const HOBBYGROUP_IMAGE = 'image';
	const HOBBYGROUP_NAME = 'name';
	const HOBBYGROUP_DESCRIPTION = 'description';
	const HOBBYGROUP_PRICE = 'price';
	const HOBBYGROUP_CAPACITY = 'capacity';
	const HOBBYGROUP_STUDENTS = 'students';

	const COLUMN_NAMES = [
		self::BASE_ID,
		self::HOBBYGROUP_IMAGE,
		self::HOBBYGROUP_NAME,
		self::HOBBYGROUP_DESCRIPTION,
		self::HOBBYGROUP_PRICE,
		self::HOBBYGROUP_CAPACITY,
		self::HOBBYGROUP_STUDENTS
	];
	private $image;
	private $name;
	private $description;
	private $price;
	private $capacity;
	private $students;

	/**
	 * @param $id
	 * @param $image
	 * @param $name
	 * @param $description
	 * @param $price
	 * @param $capacity
	 * @param $students
	 */
	public function __construct($id, $image, $name, $description, $price, $capacity, $students)
	{
		parent::__construct();
		$this->id = $id;
		$this->image = $image;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->capacity = $capacity;
		$this->students = $students;
	}

	/**
	 * @param array $params
	 * @return HobbyGroupFullEntity
	 */
	public static function constructFromArray(array $params)
	{
		return new HobbyGroupFullEntity($params[self::BASE_ID], $params[self::HOBBYGROUP_IMAGE], $params[self::HOBBYGROUP_NAME], $params[self::HOBBYGROUP_DESCRIPTION], $params[self::HOBBYGROUP_PRICE], $params[self::HOBBYGROUP_CAPACITY], $params[self::HOBBYGROUP_STUDENTS]);
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getImage()
	{
		return $this->image;
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
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @return mixed
	 */
	public function getCapacity()
	{
		return $this->capacity;
	}

	/**
	 * @return mixed
	 */
	public function getStudents()
	{
		return $this->students;
	}





}