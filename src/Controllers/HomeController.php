<?php

namespace App\Controllers;


use App\Models\Database\HobbyGroupDatabase;
use App\Models\Database\ScheduleDatabase;
use App\Models\Database\UserToHobbyGroupDatabase;
use App\Models\Database\UserToScheduleDatabase;
use App\Models\Facade\HobbyGroupFacade;
use App\Models\Facade\ScheduleFacade;

class HomeController extends BaseController
{
	public const PATH_DEFAULT = "src/Views/home.latte";
	protected $controllerName = BASESLASH;

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
	 * @param null $args
	 * @return mixed|void
	 */
	public function show(string $path = self::PATH_DEFAULT, $args = null)
	{
		$id = null;
		if ($this->getUser()->getUserInfo() !== null)
		{
			$id = $this->getUser()->getUserInfo()->getId();
		}
		$args['schedules'] = $this->scheduleFacade->getAllSchedules($id);
		parent::show($path, $args);
	}

	/**
	 * @param $variables
	 * @return mixed|void
	 */
	public function saveForm($variables)
	{
		// TODO: Implement saveForm() method.
	}

	/**
	 * @param $variables
	 * @return mixed|void
	 */
	public function loadForm($variables)
	{
		// TODO: Implement loadForm() method.
	}

	/**
	 * @param $id
	 * @return mixed|void
	 */
	public function redirectEdit($id)
	{
		// TODO: Implement redirectEdit() method.
	}

	/**
	 * @return mixed|void
	 */
	public function actionGrid()
	{
		// TODO: Implement actionGrid() method.
	}
}