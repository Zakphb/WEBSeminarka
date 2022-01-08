<?php

namespace App\Entities\Full;

class ScheduleFullEntity extends BaseFullEntity
{
	const SCHEDULE_SCHOOLROOM_ID = 'schoolroom_id';
	const SCHEDULE_HOBBYGROUP_ID = 'hobby_group_id';
	const SCHEDULE_TIME_START = 'time_start';
	const SCHEDULE_TIME_END = 'time_end';
	const SCHEDULE_CAPACITY = 'capacity';
	const SCHEDULE_SCHOOLROOM = 'schoolroom';
	const SCHLEDULE_HOBBYGROUP = 'hobbygroup';

	const COLUMN_NAMES = [
		self::BASE_ID,
		self::SCHEDULE_SCHOOLROOM_ID,
		self::SCHEDULE_HOBBYGROUP_ID,
		self::SCHEDULE_TIME_START,
		self::SCHEDULE_TIME_END,
		self::SCHEDULE_CAPACITY,
		self::SCHEDULE_SCHOOLROOM,
		self::SCHLEDULE_HOBBYGROUP
	];
	private $schoolroom_id;
	private $hobby_group_id;
	private $time_start;
	private $time_end;
	private $capacity;
	private $schoolroom;
	private $hobbygroup;

	public function __construct($id, $schoolroom_id, $hobby_group_id, $time_start, $time_end, $capacity, $schoolroom, $hobbygroup)
	{
		parent::__construct();
		$this->id = $id;
		$this->schoolroom_id = $schoolroom_id;
		$this->hobby_group_id = $hobby_group_id;
		$this->time_start = $time_start;
		$this->time_end = $time_end;
		$this->capacity = $capacity;
		$this->schoolroom = $schoolroom;
		$this->hobbygroup = $hobbygroup;
	}

	public static function constructFromArray(array $params): ScheduleFullEntity
	{
		return new ScheduleFullEntity($params[self::BASE_ID], $params[self::SCHEDULE_SCHOOLROOM_ID], $params[self::SCHEDULE_HOBBYGROUP_ID], $params[self::SCHEDULE_TIME_START], $params[self::SCHEDULE_TIME_END], $params[self::SCHEDULE_CAPACITY], $params[self::SCHEDULE_SCHOOLROOM], $params[self::SCHLEDULE_HOBBYGROUP]);
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id): void
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getSchoolroomId()
	{
		return $this->schoolroom_id;
	}

	/**
	 * @param mixed $schoolroom_id
	 */
	public function setSchoolroomId($schoolroom_id): void
	{
		$this->schoolroom_id = $schoolroom_id;
	}

	/**
	 * @return mixed
	 */
	public function getHobbyGroupId()
	{
		return $this->hobby_group_id;
	}

	/**
	 * @param mixed $hobby_group_id
	 */
	public function setHobbyGroupId($hobby_group_id): void
	{
		$this->hobby_group_id = $hobby_group_id;
	}

	/**
	 * @return mixed
	 */
	public function getTimeStart()
	{
		return $this->time_start;
	}

	/**
	 * @param mixed $time_start
	 */
	public function setTimeStart($time_start): void
	{
		$this->time_start = $time_start;
	}

	/**
	 * @return mixed
	 */
	public function getTimeEnd()
	{
		return $this->time_end;
	}

	/**
	 * @param mixed $time_end
	 */
	public function setTimeEnd($time_end): void
	{
		$this->time_end = $time_end;
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

	/**
	 * @return mixed
	 */
	public function getSchoolroom()
	{
		return $this->schoolroom;
	}

	/**
	 * @param mixed $schoolroom
	 */
	public function setSchoolroom($schoolroom): void
	{
		$this->schoolroom = $schoolroom;
	}

	/**
	 * @return mixed
	 */
	public function getHobbygroup()
	{
		return $this->hobbygroup;
	}

	/**
	 * @param mixed $hobbygroup
	 */
	public function setHobbygroup($hobbygroup): void
	{
		$this->hobbygroup = $hobbygroup;
	}



}