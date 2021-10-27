<?php

namespace App\Controllers;

use App\Entities\UserEntity;
use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\UserDatabase;
use App\Models\Facade\UserFacade;

class LoginController extends BaseController
{

	private const PATH_LOGIN = "src/Views/Login/login.latte";
	private const PATH_REGISTER = "src/Views/Login/register.latte";

	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(?string $path = self::PATH_LOGIN, $args = null)
	{
		parent::show($path, $args);
	}

	public function actionLogin()
	{
		$this->showRegister();
	}

	public function actionRegister()
	{
		$variables = $_POST;
		$userFacade = new UserFacade(new UserDatabase(), new RoleDatabase(), new PermissionDatabase());
		$userFacade->register($variables);
	}

	public function showRegister()
	{
		$this->show(self::PATH_REGISTER);
	}
}