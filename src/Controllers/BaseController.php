<?php

namespace App\Controllers;

use App\Enums\EControllerNames;
use App\Utilities\ArrayUtils;
use App\Utilities\Login;

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
		if (!$allowed[$this->controllerName])
		{
			$path = LoginController::VIEW_LOGIN;
			$args = [];
		}
		$args['allowedConstructors'] = $allowed;
		$args['actionConstructors'] = $this->actionConstructors;
		bdump($args);
		return $this->latte->render($path, $args);
	}


	private function checkPermissions($userInfo): array
	{
		$allowed = [];
		if (!is_null($userInfo))
		{
			foreach ($userInfo->getRole()->getPermisions() as $allowedController)
			{
				foreach (EControllerNames::NEEDTOCHECK as $check)
				{
					if ($allowedController->getName() === $check)
					{
						$allowed[$allowedController->getName()] = true;
					}
				}
			}
		}
		foreach (EControllerNames::ALWAYSALLOWED as $allowedController)
		{
			$allowed[$allowedController] = true;
		}
		return $allowed;
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