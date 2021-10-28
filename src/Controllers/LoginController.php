<?php

namespace App\Controllers;

use App\Core\Router;
use App\Entities\UserEntity;
use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Database\UserToRoleDatabase;
use App\Models\Facade\UserFacade;
use App\Utilities\RedirectUtils;

class LoginController extends BaseController
{

	private const PATH_LOGIN = "src/Views/Login/login.latte";
	private const PATH_REGISTER = "src/Views/Login/register.latte";
	private $userFacade;

	public function __construct($latte)
	{
		parent::__construct($latte);
		$this->userFacade = new UserFacade(new UserDatabase(), new UserToRoleDatabase());
	}

	public function show(?string $path = self::PATH_LOGIN, $args = null)
	{
		parent::show($path, $args);
	}

	public function actionLogin()
	{
		$variables = $_POST;
		$logged = $this->userFacade->login($variables, $this->getUser());
		if ($logged->isSuccess())
		{

		} else
		{
			$this->show();
		}
	}

	public function actionRegister()
	{
		$variables = $_POST;
		$registered = $this->userFacade->register($variables);
		if ($registered->isSuccess())
		{
			$this->show();
		} else
		{
			$this->show(self::PATH_REGISTER);
		}
	}

	public function showRegister()
	{
		$this->show(self::PATH_REGISTER);
	}
}