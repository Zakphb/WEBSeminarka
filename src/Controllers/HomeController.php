<?php

namespace App\Controllers;

class HomeController extends BaseController
{

	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(string $pageTitle, $args = null)
	{
		parent::show("src/Views/home.latte");
	}
}