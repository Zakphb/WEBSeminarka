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
use App\Models\Database\UserToHobbyGroupDatabase;
use App\Models\Database\UserToScheduleDatabase;

class ScheduleFacade
{
	private ScheduleDatabase $scheduleDatabase;
	private UserToScheduleDatabase $userToScheduleDatabase;

	public function __construct(ScheduleDatabase $scheduleDatabase, UserToScheduleDatabase $userToScheduleDatabase)
	{
		$this->scheduleDatabase = $scheduleDatabase;
		$this->userToScheduleDatabase = $userToScheduleDatabase;
		$this->schoolroomFacade = new SchoolroomFacade(new SchoolroomDatabase(), new SchoolroomTypeDatabase());
		$this->hobbygroupFacade = new HobbyGroupFacade(new HobbyGroupDatabase(), new UserToHobbyGroupDatabase());
	}

	public function saveSchedule($formVariables)
	{
		return $this->scheduleDatabase->save($formVariables);
	}

	private function getAdditionalData($schedule)
	{
		$schedule = $schedule->toArray();
		$schoolroom = $this->schoolroomFacade->getSchoolroomById($schedule[ScheduleObjectEntity::SCHEDULE_SCHOOLROOM_ID]);
		$hobbygroup = $this->hobbygroupFacade->getFullHobbyGroup($schedule[ScheduleObjectEntity::SCHEDULE_HOBBYGROUP_ID]);
		$schedule['schoolroom'] = $schoolroom;
		$schedule['hobbygroup'] = $hobbygroup;
		return $schedule;
	}

	public function getFullSchedule($id): ScheduleFullEntity
	{
		$schedule = $this->scheduleDatabase->getById($id);
		$schedule = $this->getAdditionalData($schedule);
		return ScheduleFullEntity::constructFromArray($schedule);
	}

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