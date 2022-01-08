<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\UserToScheduleDecompEntity;
use App\Entities\Database\Object\ScheduleObjectEntity;
use App\Entities\Database\Object\SchoolroomObjectEntity;
use App\Entities\Full\ScheduleFullEntity;
use App\Models\Database\HobbyGroupDatabase;
use App\Models\Database\ScheduleDatabase;
use App\Models\Database\SchoolroomDatabase;
use App\Models\Database\SchoolroomTypeDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToHobbyGroupDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Database\UserToScheduleDatabase;
use App\Utilities\DateTimeUtility;

/**
 *
 */
class ScheduleFacade
{
	private ScheduleDatabase $scheduleDatabase;

	/**
	 * @param ScheduleDatabase $scheduleDatabase
	 */
	public function __construct(ScheduleDatabase $scheduleDatabase)
	{
		$this->scheduleDatabase = $scheduleDatabase;
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase(), new UserToScheduleDatabase());
		$this->schoolroomFacade = new SchoolroomFacade(new SchoolroomDatabase(), new SchoolroomTypeDatabase());
		$this->hobbygroupFacade = new HobbyGroupFacade(new HobbyGroupDatabase(), new UserToHobbyGroupDatabase());
	}

	/**
	 * @param $formVariables
	 * @return string
	 */
	public function saveSchedule($formVariables)
	{
		$formVariables[ScheduleObjectEntity::SCHEDULE_TIME_START] = DateTimeUtility::getDateTime($formVariables[ScheduleObjectEntity::SCHEDULE_TIME_START]);
		$formVariables[ScheduleObjectEntity::SCHEDULE_TIME_END] = DateTimeUtility::getDateTime($formVariables[ScheduleObjectEntity::SCHEDULE_TIME_END]);
		return $this->scheduleDatabase->save($formVariables);
	}

	/**
	 * @param $schedule
	 * @return mixed
	 */
	private function getAdditionalData($schedule)
	{
		$schedule = $schedule->toArray();
		$schoolroom = $this->schoolroomFacade->getSchoolroomById($schedule[ScheduleObjectEntity::SCHEDULE_SCHOOLROOM_ID]);
		$hobbygroup = $this->hobbygroupFacade->getFullHobbyGroup($schedule[ScheduleObjectEntity::SCHEDULE_HOBBYGROUP_ID]);
		$schedule['schoolroom'] = $schoolroom;
		$schedule['hobbygroup'] = $hobbygroup;
		return $schedule;
	}

	/**
	 * @param $id
	 * @return ScheduleFullEntity
	 */
	public function getFullSchedule($id): ScheduleFullEntity
	{
		$schedule = $this->scheduleDatabase->getById($id);
		$schedule = $this->getAdditionalData($schedule);
		return ScheduleFullEntity::constructFromArray($schedule);
	}

	/**
	 * @return array
	 */
	public function getAllSchedules()
	{
		$schedules = $this->scheduleDatabase->getAll();
		$fullSchedules = [];
		foreach ($schedules as $schedule)
		{
			$fullSchedules[] = ScheduleFullEntity::constructFromArray($this->getAdditionalData($schedule));
		}
		return $fullSchedules;
	}


}