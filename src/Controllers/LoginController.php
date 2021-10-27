<?php

namespace App\Controllers;

class LoginController extends BaseController
{

	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(string $pageTitle, $args = null)
	{
		parent::show("src/Views/Login/login.latte");
	}

	public function actionLogin(){

	}
}