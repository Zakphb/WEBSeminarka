<?php

namespace App\Controllers;

use App\Entities\Database\Decomp\UserToScheduleDecompEntity;
use App\Entities\Database\Object\BaseObjectEntity;
use App\Entities\Full\ScheduleFullEntity;
use App\Enums\ActionConstructors\EProfileConstructor;
use App\Enums\EControllerNames;
use App\Models\Database\ScheduleDatabase;
use App\Models\Facade\ScheduleFacade;
use App\Utilities\RedirectUtils;

class ProfileController extends BaseController
{

	public const VIEW_PROFILE = "src/Views/Profile/profile.latte";
	public const VIEW_GRID = "src/Views/Profile/grid.latte";
	protected $controllerName = EControllerNames::PROFILE;

	/**
	 * @param $latte
	 */
	public function __construct($latte)
	{
		parent::__construct($latte);
		$this->scheduleFacade = new ScheduleFacade(new ScheduleDatabase());
	}

	/**
	 * @param string $path
	 * @param array $args
	 * @return mixed
	 */
	public function show(string $path = self::VIEW_PROFILE, $args = [])
	{
		if ($path === self::VIEW_PROFILE)
		{
			$args[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID] = $this->getVariables()[self::GET][BaseObjectEntity::BASE_ID];
			$args['schedules'] = $this->scheduleFacade->getRelatedSchedules($args[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID]);
			$args['profileInfo'] = $this->scheduleFacade->userFacade->getFullUser($args[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID]);
		}
		bdump($args);
		return parent::show($path, $args); // TODO: Change the autogenerated stub
	}

	public function join()
	{
		$variablesPost = $this->getVariables()[self::POST];
		if ($this->scheduleFacade->isScheduleFull($variablesPost[UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID]))
		{
			RedirectUtils::redirect();
		}
		$this->scheduleFacade->joinSchedule($variablesPost[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID], $variablesPost[UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID]);
		RedirectUtils::redirectWithURLBuild($this->controllerName, [BaseObjectEntity::BASE_ID => $variablesPost[UserToScheduleDecompEntity::USER_TO_SCHEDULE_USER_ID]]);
	}

	/**
	 * @return mixed|void
	 */
	public function actionGrid()
	{
		$variables = $this->getVariables()[self::GET];
		if ($this->getUser()->getUserInfo() !== null){
			$role = $this->getUser()->getUserInfo()->getRole()->getName();
		}
		if ($role === 'teacher' || $role === 'super')
		{
			$gridValues = $this->scheduleFacade->getRelatedStudents($variables[BaseObjectEntity::BASE_ID]);
			$args["gridvalues"] = $gridValues;
			$args["scheduleId"] = $variables[BaseObjectEntity::BASE_ID];
			$this->show(self::VIEW_GRID, $args);
		}
	}

	public function saveForm($variables)
	{
	}

	public function loadForm($variables)
	{
	}

	public function redirectEdit($id)
	{
	}

	public function actionAllow(){
		$variables = $this->getVariables()[self::POST];
		$args[BaseObjectEntity::BASE_ID] = $variables[UserToScheduleDecompEntity::USER_TO_SCHEDULE_SCHEDULE_ID];
		$this->scheduleFacade->userFacade->saveAllowance($variables);
		RedirectUtils::redirectWithURLBuild(EProfileConstructor::grid(), $args);
	}

}