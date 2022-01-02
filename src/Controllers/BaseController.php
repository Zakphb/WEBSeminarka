<?php

namespace App\Controllers;

use App\Entities\Full\UserFullEntity;
use App\Enums\ActionConstructors\EBaseActionConstructor;
use App\Enums\ActionConstructors\EHobbyGroupConstructor;
use App\Enums\ActionConstructors\ELoginConstructor;
use App\Enums\ActionConstructors\EPermissionConstructor;
use App\Enums\ActionConstructors\ERoleConstructor;
use App\Enums\ActionConstructors\ESchoolroomConstructor;
use App\Enums\EControllerNames;
use App\Utilities\ArrayUtils;
use App\Utilities\Login;
use App\Utilities\RedirectUtils;

abstract class BaseController implements IController
{
	private $latte;
	private Login $user;
	private array $actionConstructors;

	public function __construct($latte)
	{
		$this->latte = $latte;
		$this->user = new Login();
		$this->actionConstructors = $this->getActionConstructors();
	}

	public function show(string $path = DEFAULT_WEB_PAGE_KEY, $args = [])
	{
		$args['user'] = $this->user;
		$args['userinfo'] = $this->user->getUserInfo();
		$allowed = $this->checkPermissions($args['userinfo']);
		if (!$allowed)
		{
        	$path = LoginController::VIEW_LOGIN;
			$args = [];
		}
		$args['actionConstructors'] = $this->actionConstructors;
		return $this->latte->render($path, $args);
	}


	private function checkPermissions($userInfo): bool
	{
		foreach (EControllerNames::ALWAYSALLOWED as $allowed)
		{
			if ($this->controllerName === $allowed)
			{
				return true;
			}
		}
		if (is_null($userInfo)){
			return false;
		}
		foreach (EControllerNames::NEEDTOCHECK as $check)
		{
			foreach ($userInfo->getRole()->getPermisions() as $allowed)
			{
				if ($allowed->getName() === $check){
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * @return mixed
	 */
	public function getLatte()
	{
		return $this->latte;
	}

	/**
	 * @return Login
	 */
	public function getUser(): Login
	{
		return $this->user;
	}

	private function getActionConstructors()
	{
		return ArrayUtils::changeKey(array_map(function ($controller)
		{
			return new $controller;
		}, EControllerNames::CONTROLLERS), EControllerNames::NAMES);
	}

	function mapActions($controller)
	{
		$controller = get_class($controller);
		return [];
	}

	public function actionEdit()
	{
		$variablesGet = $_GET;
		$variablesPost = $_POST;
		$postEmpty = empty($variablesPost);
		$getEmpty = empty($variablesGet);
		if ($postEmpty && $getEmpty)
		{
			$this->show();
		}
		if (!$postEmpty && !$getEmpty)
		{
			$id = $this->saveForm($variablesPost);
			$this->redirectEdit($id);
		}
		if (!$postEmpty)
		{
			$id = $this->saveForm($variablesPost);
			$this->redirectEdit($id);
		}
		if (!$getEmpty)
		{
			$this->loadForm($variablesGet);
		}
	}


}