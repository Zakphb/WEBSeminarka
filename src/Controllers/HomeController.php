<?php

namespace App\Controllers;

class HomeController extends BaseController
{
	public const PATH_DEFAULT = "src/Views/home.latte";
	public const URL_DEFAULT = "http://localhost/";

	public function __construct($latte)
	{
		parent::__construct($latte, null);
	}

	public function show(?string $path = self::PATH_DEFAULT, $args = null)
	{
		parent::show($path);
	}
}