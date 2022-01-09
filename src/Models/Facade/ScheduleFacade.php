<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\UserToScheduleDecompEntity;
use App\Entities\Database\Object\BaseObjectEntity;
use App\Entities\Database\Object\ScheduleObjectEntity;
use App\Entities\Database\Object\SchoolroomObjectEntity;
use App\Entities\Full\ScheduleFullEntity;
use App\Entities\Full\UserScheduleFullEntity;
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
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase(), new UserToScheduleDatabase(), new UserToHobbyGroupDatabase());
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
		$teacherId = $formVariables[ScheduleFullEntity::SCHEDULE_TEACHER];
		unset($formVariables[ScheduleFullEntity::SCHEDULE_TEACHER]);
		$scheduleId = $this->scheduleDatabase->save($formVariables);
		$this->saveTeacher($teacherId, $scheduleId);
		return $scheduleId;
	}

	/**
	 *
	 */
	private function saveTeacher($teacherId, $scheduleId)
	{
		$this->userFacade->saveTeacher([UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID => $teacherId, UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID => $scheduleId]);
	}

	/**
	 * @param $schedule
	 * @return mixed
	 */
	private function getAdditionalData($schedule, $userId = null)
	{
		$schedule = $schedule->toArray();
		$schoolroom = $this->schoolroomFacade->getSchoolroomById($schedule[ScheduleObjectEntity::SCHEDULE_SCHOOLROOM_ID]);
		$hobbygroup = $this->hobbygroupFacade->getFullHobbyGroup($schedule[ScheduleObjectEntity::SCHEDULE_HOBBYGROUP_ID]);
		$teacher = $this->userFacade->getRelatedTeacher($schedule[BaseObjectEntity::BASE_ID]);
		if (!is_null($userId))
		{
			$isAllowed = $this->userFacade->isAllowed($schedule[BaseObjectEntity::BASE_ID], $userId);
			$schedule[ScheduleFullEntity::SCHEDULE_ALLOWED] = $isAllowed;
		} else
		{
			$schedule[ScheduleFullEntity::SCHEDULE_ALLOWED] = null;
		}
		$schedule[ScheduleFullEntity::SCHEDULE_CAPACITY] = ($schedule[ScheduleFullEntity::SCHEDULE_CAPACITY] > $hobbygroup->getCapacity()) ? $hobbygroup->getCapacity() : $schedule[ScheduleFullEntity::SCHEDULE_CAPACITY];
		$schedule[ScheduleFullEntity::SCHEDULE_OCCUPANCY] = $this->userFacade->getOccupancyOfSchedule($schedule[BaseObjectEntity::BASE_ID]);
		$schedule[ScheduleFullEntity::SCHEDULE_DURATION] = DateTimeUtility::getDuration($schedule[ScheduleObjectEntity::SCHEDULE_TIME_START], $schedule[ScheduleObjectEntity::SCHEDULE_TIME_END]);
		$schedule[ScheduleFullEntity::SCHEDULE_TIME_START] = DateTimeUtility::convertDatabaseToCzech($schedule[ScheduleFullEntity::SCHEDULE_TIME_START]);
		$schedule[ScheduleFullEntity::SCHEDULE_TIME_END] = DateTimeUtility::convertDatabaseToCzech($schedule[ScheduleFullEntity::SCHEDULE_TIME_END]);
		$schedule[ScheduleFullEntity::SCHEDULE_SCHOOLROOM] = $schoolroom;
		$schedule[ScheduleFullEntity::SCHLEDULE_HOBBYGROUP] = $hobbygroup;
		$schedule[ScheduleFullEntity::SCHEDULE_TEACHER] = $teacher;
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
	public function getAllSchedules($userId = null)
	{
		$schedules = $this->scheduleDatabase->getAll();
		$fullSchedules = [];
		foreach ($schedules as $schedule)
		{
			if (is_null($userId))
			{
				$fullSchedules[] = ScheduleFullEntity::constructFromArray($this->getAdditionalData($schedule));
			} else
			{
				$fullSchedules[] = ScheduleFullEntity::constructFromArray($this->getAdditionalData($schedule, $userId));
			}

		}
		return $fullSchedules;
	}

	public function getRelatedSchedules($userId)
	{
		$UtSchedules = $this->userFacade->getRelatedSchedules($userId);
		$schedules = [];
		foreach ($UtSchedules as $utSchedule)
		{
			$schedule = $this->scheduleDatabase->getById($utSchedule->schedule_id);
			$schedules[] = ScheduleFullEntity::constructFromArray($this->getAdditionalData($schedule, $userId));
		}
		return $schedules;
	}

	public function joinSchedule($userId, $scheduleId)
	{
		return $this->userFacade->joinSchedule($userId, $scheduleId);
	}

	public function isScheduleFull($scheduleId)
	{
		$occupancy = $this->userFacade->getOccupancyOfSchedule($scheduleId);
		$schedule = $this->getFullSchedule($scheduleId);
		$capacity = ($schedule->getCapacity() > $schedule->getHobbygroup()->getCapacity()) ? $schedule->getHobbygroup()->getCapacity() : $schedule->getCapacity();
		return $occupancy >= $capacity;
	}

	public function getRelatedStudents($scheduleId)
	{
		$relatedStudents = [];
		$UserScheduleObjects = $this->userFacade->getRelatedStudents($scheduleId);
		foreach ($UserScheduleObjects as $userScheduleObject)
		{
			$userScheduleObject = $userScheduleObject->toArray();
			$userScheduleObject[UserScheduleFullEntity::USER_HOBBYGROUP_ID] = $this->scheduleDatabase->getById($scheduleId)->getHobbygroupId();
			$relatedStudents[] = UserScheduleFullEntity::constructFromArray($userScheduleObject);
		}
		return $relatedStudents;

	}


}