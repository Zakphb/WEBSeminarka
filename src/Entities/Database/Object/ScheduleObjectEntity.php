<?php

namespace App\Entities\Database\Object;

class ScheduleObjectEntity extends BaseObjectEntity
{
	const SCHEDULE_SCHOOLROOM_ID = 'schoolroom_id';
	const SCHEDULE_HOBBYGROUP_ID = 'hobby_group_id';
	const SCHEDULE_TIME_START = 'time_start';
	const SCHEDULE_TIME_END = 'time_end';
	const SCHEDULE_CAPACITY = 'capacity';

	const COLUMN_NAMES = [
		self::BASE_ID,
		self::SCHEDULE_SCHOOLROOM_ID,
		self::SCHEDULE_HOBBYGROUP_ID,
		self::SCHEDULE_TIME_START,
		self::SCHEDULE_TIME_END,
		self::SCHEDULE_CAPACITY
	];


	protected $schoolroom_id;
	protected $hobbygroup_id;
	protected $time_start;
	protected $time_end;
	protected $capacity;


	public function toArray(): array
	{
		return [
			self::BASE_ID => $this->id,
			self::SCHEDULE_SCHOOLROOM_ID => $this->schoolroom_id,
			self::SCHEDULE_HOBBYGROUP_ID => $this->hobbygroup_id,
			self::SCHEDULE_TIME_START => $this->time_start,
			self::SCHEDULE_TIME_END => $this->time_end,
			self::SCHEDULE_CAPACITY => $this->capacity
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
	public function getSchoolroomId()
	{
		return $this->schoolroom_id;
	}

	/**
	 * @return mixed
	 */
	public function getHobbygroupId()
	{
		return $this->hobbygroup_id;
	}

	/**
	 * @return mixed
	 */
	public function getTimeStart()
	{
		return $this->time_start;
	}

	/**
	 * @return mixed
	 */
	public function getTimeEnd()
	{
		return $this->time_end;
	}

	/**
	 * @return mixed
	 */
	public function getCapacity()
	{
		return $this->capacity;
	}


}