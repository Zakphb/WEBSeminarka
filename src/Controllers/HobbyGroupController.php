<?php

namespace App\Controllers;

use App\Entities\Database\Object\BaseObjectEntity;
use App\Enums\ActionConstructors\EHobbyGroupConstructor;
use App\Models\Database\HobbyGroupDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToHobbyGroupDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Facade\HobbyGroupFacade;
use App\Models\Facade\UserFacade;
use App\Utilities\Login;
use App\Utilities\RedirectUtils;

class HobbyGroupController extends BaseController
{
	public const VIEW_GRID = "src/Views/HobbyGroup/grid.latte";
	public const VIEW_EDIT = "src/Views/HobbyGroup/edit.latte";
	protected $controllerName = EHobbyGroupConstructor::CONTROLLER_NAME;

	public function __construct($latte)
	{
		parent::__construct($latte);
		$this->hobbyGroupFacade = new HobbyGroupFacade(new HobbyGroupDatabase(), new UserToHobbyGroupDatabase());
	}

	public function show(string $path = self::VIEW_EDIT, $args = [])
	{
		if ($path === self::VIEW_EDIT){
			$args['selectNames'] = $this->hobbyGroupFacade->getAllStudentsForSelect();
		}
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
		$gridValues = $this->hobbyGroupFacade->getAllHobbyGroups();
		$args["gridvalues"] = $gridValues;
		$this->show(self::VIEW_GRID, $args);
	}

	public function actionEdit()
	{
		parent::actionEdit(); // TODO: Change the autogenerated stub
	}


	public function saveForm($variables):string
	{
		return (string)$this->hobbyGroupFacade->saveHobbyGroup($variables);
	}

	public function loadForm($variables)
	{
		$args['formData'] = $this->hobbyGroupFacade->getFullHobbyGroup($variables[BaseObjectEntity::BASE_ID]);
		$this->show(self::VIEW_EDIT, $args);
	}

	public function redirectEdit($id)
	{
		RedirectUtils::redirectWithURLBuild(EHobbyGroupConstructor::edit(), [BaseObjectEntity::BASE_ID => $id]);
	}

}