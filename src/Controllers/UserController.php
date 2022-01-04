<?php

namespace App\Controllers;


class UserController extends BaseController
{
	protected $controllerName = EUserConstructor::CONTROLLER_NAME;
	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(?string $path, $args = null)
	{
		parent::show($path);
	}
}