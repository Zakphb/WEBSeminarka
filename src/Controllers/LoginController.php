<?php

namespace App\Controllers;

use App\Models\Database\UserDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Facade\UserFacade;
use App\Utilities\RedirectUtils;
use App\Utilities\Response;

class LoginController extends BaseController
{

	private const VIEW_LOGIN = "src/Views/Login/login.latte";
	private const VIEW_REGISTER = "src/Views/Login/register.latte";
	private $userFacade;

	public function __construct($latte)
	{
		parent::__construct($latte, null);
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase());
	}

	public function show(?string $path = self::VIEW_LOGIN, $args = null)
	{
		parent::show($path, $args);
	}

	public function actionLogin()
	{
		$variables = $_POST;
		$logged = $this->userFacade->login($variables, $this->getUser());
		if ($logged->isSuccess())
		{
			RedirectUtils::redirect(HomeController::URL_DEFAULT);
		} else
		{
			$this->show();
		}
	}

	public function actionLogout()
	{
		$this->getUser()->logout();
		RedirectUtils::redirect(HomeController::URL_DEFAULT);
	}

	public function actionRegister()
	{
		$variables = $_POST;
		$registered = $this->userFacade->register($variables);
		if ($registered->isSuccess())
		{
			RedirectUtils::redirect(HomeController::URL_DEFAULT);
		} else
		{
			$this->show(self::VIEW_REGISTER);
		}
	}

	public function showRegister()
	{
		$this->show(self::VIEW_REGISTER);
	}
}