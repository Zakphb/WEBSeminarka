<?php

namespace App\Controllers;

abstract class BaseController implements IController
{
	private $latte;

	public function __construct($latte)
	{
		$this->latte = $latte;
	}

	public function show(string $pageTitle,$args = null)
	{
		if (is_null($args)){
			$args = [];
		}
		return $this->latte->render($pageTitle, $args);
	}
}