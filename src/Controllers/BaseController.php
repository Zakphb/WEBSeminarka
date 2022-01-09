<?php

namespace App\Controllers;

use App\Entities\Database\Object\BaseObjectEntity;
use App\Enums\EControllerNames;
use App\Utilities\ArrayUtils;
use App\Utilities\Login;
use App\Utilities\RedirectUtils;

/**
 *
 */
abstract class BaseController implements IController
{
	private $latte;
	private Login $user;
	private array $actionConstructors;

	const GET = 'GET';
	const GET_EMPTY = 'GETEmpty';
	const POST = 'POST';
	const POST_EMPTY = 'POSTEmpty';

	/**
	 * @param $latte
	 */
	public function __construct($latte)
	{
		$this->latte = $latte;
		$this->user = new Login();
		$this->actionConstructors = $this->getActionConstructors();
	}

	/**
	 * @param string|null $path
	 * @param array $args
	 * @return mixed
	 */
	public function show(string $path = DEFAULT_WEB_PAGE_KEY, $args = [])
	{
		$args['user'] = $this->user;
		$args['userinfo'] = $this->user->getUserInfo();
		$allowed = $this->checkPermissions($args['userinfo']);
		if (!$allowed[$this->controllerName])
		{
			RedirectUtils::redirectToLogin();
		}
		if ($allowed[$this->controllerName] === EControllerNames::PROFILE)
		{
			$variables = $this->getVariables();
			if (!($variables[self::GET][BaseObjectEntity::BASE_ID] === $args['userinfo']->getId()) && !($args['userinfo']->getRole()->getName() === 'super'))
			{
				RedirectUtils::redirect();
			}
		}
		$args['allowedConstructors'] = $allowed;
		$args['actionConstructors'] = $this->actionConstructors;
		return $this->latte->render($path, $args);
	}

	/**
	 * @param $userInfo
	 * @return array
	 */
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

	/**
	 * @return array|false
	 */
	private function getActionConstructors()
	{
		return ArrayUtils::changeKey(array_map(function ($controller)
		{
			return new $controller;
		}, EControllerNames::CONTROLLERS), EControllerNames::NAMES);
	}

	/**
	 * @return mixed|void
	 */
	public function actionEdit()
	{
		$variables = $this->getVariables();
		if ($variables[self::POST_EMPTY] && $variables[self::GET_EMPTY])
		{
			$this->show();
		}
		if (!$variables[self::POST_EMPTY] && !$variables[self::GET_EMPTY])
		{
			if (!empty($_FILES))
			{
				$variables[self::POST]['files'] = $_FILES;
			}
			$id = $this->saveForm($variables[self::POST]);
			$this->redirectEdit($id);
		}
		if (!$variables[self::POST_EMPTY])
		{
			if (!empty($_FILES))
			{
				$variables[self::POST]['files'] = $_FILES;
			}
			$id = $this->saveForm($variables[self::POST]);
			$this->redirectEdit($id);
		}
		if (!$variables[self::GET_EMPTY])
		{
			$this->loadForm($variables[self::GET]);
		}
	}

	/**
	 * @return array
	 */
	public function getVariables()
	{
		$variables[self::GET] = $_GET;
		$variables[self::POST] = $_POST;
		$variables[self::POST_EMPTY] = empty($_POST);
		$variables[self::GET_EMPTY] = empty($_GET);
		if (!$variables[self::POST_EMPTY])
		{
			foreach ($variables[self::POST] as $key => $value)
			{
				$variables[self::POST][$this->validate($key)] = $this->validate($value);
			}
		}
		if (!$variables[self::GET_EMPTY])
		{
			foreach ($variables[self::GET] as $key => $value)
			{
				$variables[self::GET][$this->validate($key)] = $this->validate($value);
			}
		}
		return $variables;
	}

	/**
	 * @param $value
	 * @return string
	 */
	private function validate($value)
	{
		$value = trim($value);
		$value = stripslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}

	/**
	 *
	 */
	public function actionDelete(){

	}

}