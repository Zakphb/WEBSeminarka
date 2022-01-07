<?php

namespace App\Controllers;


class HomeController extends BaseController
{
	public const PATH_DEFAULT = "src/Views/home.latte";
	protected $controllerName = BASESLASH;
	public function __construct($latte)
	{
		parent::__construct($latte);
	}

	public function show(string $path = self::PATH_DEFAULT, $args = null)
	{
		parent::show($path);
	}

	public function saveForm($variables)
	{
		// TODO: Implement saveForm() method.
	}

	public function loadForm($variables)
	{
		// TODO: Implement loadForm() method.
	}

	public function redirectEdit($id)
	{
		// TODO: Implement redirectEdit() method.
	}

	public function actionGrid()
	{
		// TODO: Implement actionGrid() method.
	}
}