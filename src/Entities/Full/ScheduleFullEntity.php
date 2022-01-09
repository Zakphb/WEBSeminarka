<?php

namespace App\Entities\Full;

use App\Entities\Database\Object\SchoolroomObjectEntity;

class ScheduleFullEntity extends BaseFullEntity
{
	const SCHEDULE_SCHOOLROOM_ID = 'schoolroom_id';
	const SCHEDULE_HOBBYGROUP_ID = 'hobby_group_id';
	const SCHEDULE_TIME_START = 'time_start';
	const SCHEDULE_TIME_END = 'time_end';
	const SCHEDULE_CAPACITY = 'capacity';
	const SCHEDULE_SCHOOLROOM = 'schoolroom';
	const SCHLEDULE_HOBBYGROUP = 'hobbygroup';
	const SCHEDULE_TEACHER = 'teacher';
	const SCHEDULE_DURATION = 'duration';
	const SCHEDULE_OCCUPANCY = 'occupancy';
	const SCHEDULE_ALLOWED = 'allowed';

	const COLUMN_NAMES = [
		self::BASE_ID,
		self::SCHEDULE_SCHOOLROOM_ID,
		self::SCHEDULE_HOBBYGROUP_ID,
		self::SCHEDULE_TIME_START,
		self::SCHEDULE_TIME_END,
		self::SCHEDULE_CAPACITY,
		self::SCHEDULE_SCHOOLROOM,
		self::SCHLEDULE_HOBBYGROUP,
		self::SCHEDULE_TEACHER,
		self::SCHEDULE_DURATION,
		self::SCHEDULE_OCCUPANCY,
		self::SCHEDULE_ALLOWED
	];
	private $schoolroom_id;
	private $hobby_group_id;
	private $time_start;
	private $time_end;
	private $capacity;
	private $schoolroom;
	private $hobbygroup;
	private $teacher;
	private $duration;
	private $occupancy;
	private $allowed;

	/**
	 * @param $id
	 * @param $schoolroom_id
	 * @param $hobby_group_id
	 * @param $time_start
	 * @param $time_end
	 * @param $capacity
	 * @param SchoolroomObjectEntity $schoolroom
	 * @param HobbyGroupFullEntity $hobbygroup
	 * @param UserFullEntity $teacher
	 * @param $duration
	 * @param $occupancy
	 * @param $allowed
	 */
	public function __construct($id, $schoolroom_id, $hobby_group_id, $time_start, $time_end, $capacity, SchoolroomObjectEntity $schoolroom, HobbyGroupFullEntity $hobbygroup, UserFullEntity $teacher, $duration, $occupancy, $allowed)
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
		$this->teacher = $teacher;
		$this->duration = $duration;
		$this->occupancy = $occupancy;
		$this->allowed = $allowed;
	}

	/**
	 * @param array $params
	 * @return ScheduleFullEntity
	 */
	public static function constructFromArray(array $params): ScheduleFullEntity
	{
		return new ScheduleFullEntity($params[self::BASE_ID], $params[self::SCHEDULE_SCHOOLROOM_ID], $params[self::SCHEDULE_HOBBYGROUP_ID], $params[self::SCHEDULE_TIME_START], $params[self::SCHEDULE_TIME_END], $params[self::SCHEDULE_CAPACITY], $params[self::SCHEDULE_SCHOOLROOM], $params[self::SCHLEDULE_HOBBYGROUP], $params[self::SCHEDULE_TEACHER], $params[self::SCHEDULE_DURATION], $params[self::SCHEDULE_OCCUPANCY], $params[self::SCHEDULE_ALLOWED]);
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

	/**
	 * @return mixed
	 */
	public function getTeacher()
	{
		return $this->teacher;
	}

	/**
	 * @param mixed $teacher
	 */
	public function setTeacher($teacher): void
	{
		$this->teacher = $teacher;
	}


	/**
	 * @return mixed
	 */
	public function getDuration()
	{
		return $this->duration;
	}

	/**
	 * @param mixed $duration
	 */
	public function setDuration($duration): void
	{
		$this->duration = $duration;
	}

	/**
	 * @return mixed
	 */
	public function getOccupancy()
	{
		return $this->occupancy;
	}

	/**
	 * @param mixed $occupancy
	 */
	public function setOccupancy($occupancy): void
	{
		$this->occupancy = $occupancy;
	}

	/**
	 * @return mixed
	 */
	public function getAllowed()
	{
		return $this->allowed;
	}


}