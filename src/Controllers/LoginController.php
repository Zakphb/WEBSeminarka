<?php

namespace App\Controllers;

use App\Enums\ActionConstructors\ELoginConstructor;
use App\Enums\EBaseActionConstructor;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Facade\UserFacade;
use App\Utilities\RedirectUtils;
use App\Utilities\Response;

class LoginController extends BaseController
{

	public const VIEW_LOGIN = "src/Views/Login/login.latte";
	private const VIEW_REGISTER = "src/Views/Login/register.latte";
	private $userFacade;
	protected $controllerName = ELoginConstructor::CONTROLLER_NAME;

	public function __construct($latte)
	{
		parent::__construct($latte);
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase());
	}

	public function show(string $path = self::VIEW_LOGIN, $args = null)
	{
		parent::show($path, $args);
	}

	public function actionLogin()
	{
		$variables = $_POST;
		if (empty($variables)){
			$this->show();
		}
		$logged = $this->userFacade->login($variables, $this->getUser());
		if ($logged->isSuccess())
		{
			RedirectUtils::redirect();
		} else
		{
			$this->show();
		}
	}

	public function actionLogout()
	{
		$this->getUser()->logout();
		RedirectUtils::redirect();
	}

	public function actionRegister()
	{
		$variables = $_POST;
		$registered = $this->userFacade->register($variables);
		if ($registered->isSuccess())
		{
			RedirectUtils::redirect();
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