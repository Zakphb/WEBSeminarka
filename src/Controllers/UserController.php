<?php

namespace App\Controllers;

class UserController extends BaseController
{

	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(?string $path, $args = null)
	{
		parent::show($path);
	}
}