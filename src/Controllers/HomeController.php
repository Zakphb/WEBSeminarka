<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	private const PATH_DEFAULT = "src/Views/home.latte";

	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(?string $path = self::PATH_DEFAULT, $args = null)
	{
		parent::show($path);
	}
}