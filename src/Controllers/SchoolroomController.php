<?php

namespace App\Controllers;

use App\Entities\Database\Object\BaseObjectEntity;
use App\Enums\ActionConstructors\ESchoolroomConstructor;
use App\Models\Database\SchoolroomDatabase;
use App\Models\Database\SchoolroomTypeDatabase;
use App\Models\Facade\SchoolroomFacade;
use App\Utilities\Login;
use App\Utilities\RedirectUtils;
use Tracy\Debugger;
use Tracy\Logger;

class SchoolroomController extends BaseController
{
	public const VIEW_GRID = "src/Views/Schoolroom/grid.latte";
	public const VIEW_EDIT = "src/Views/Schoolroom/edit.latte";
	protected $controllerName = ESchoolroomConstructor::CONTROLLER_NAME;

	public function __construct($latte)
	{
		parent::__construct($latte);
		$this->schoolroomFacade = new SchoolroomFacade(new SchoolroomDatabase(), new SchoolroomTypeDatabase());
	}

	public function show(string $path = self::VIEW_EDIT, $args = [])
	{
		$args['selectNames'] = $this->schoolroomFacade->getTypeNamesForSelect();
		return parent::show($path, $args); // TODO: Change the autogenerated stub
	}

	public function getLatte()
	{
		return parent::getLatte(); // TODO: Change the autogenerated stub
	}

	public function getUser(): Login
	{
		return parent::getUser(); // TODO: Change the autogenerated stub
	}

	public function actionGrid()
	{
		$gridValues = $this->schoolroomFacade->getAllSchoolrooms();
		$args["gridvalues"] = $gridValues;
		$this->show(self::VIEW_GRID, $args);
	}

	public function actionEdit()
	{
		parent::actionEdit(); // TODO: Change the autogenerated stub
	}

	public function actionDelete(){
		$variablesGet = $_GET;
	}

	protected function saveForm($variables)
	{
		return $this->schoolroomFacade->saveSchoolroom($variables);
	}

	protected function loadForm($variables)
	{
		$args['formData'] = $this->schoolroomFacade->getSchoolroomById($variables[BaseObjectEntity::BASE_ID]);
		$this->show(self::VIEW_EDIT, $args);
	}

	protected function redirectEdit($id)
	{
		RedirectUtils::redirectWithURLBuild(ESchoolroomConstructor::edit(), [BaseObjectEntity::BASE_ID => $id]);
	}

}