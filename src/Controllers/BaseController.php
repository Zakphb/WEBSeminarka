<?php

namespace App\Controllers;

use App\Utilities\Login;

abstract class BaseController implements IController
{
	private $latte;
	private Login $user;

	public function __construct($latte)
	{
		$this->latte = $latte;
		$this->user = new Login();
	}

	public function show(?string $path, $args = [])
	{
		$args['user'] = $this->user;
		return $this->latte->render($path, $args);
	}

	/**
	 * @return mixed
	 */
	public function getLatte()
	{
		return $this->latte;
	}

	/**
	 * @return Login
	 */
	public function getUser(): Login
	{
		return $this->user;
	}
}