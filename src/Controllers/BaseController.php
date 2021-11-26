<?php

namespace App\Controllers;

use App\Enums\EBaseActionNames;
use App\Utilities\Login;

abstract class BaseController implements IController
{
	private $latte;
	private Login $user;
	private $actions;

	public function __construct($latte, ?EBaseActionNames $actions)
	{
		$this->latte = $latte;
		$this->user = new Login();
		$this->actions = $actions;
	}

	public function show(string $path = DEFAULT_WEB_PAGE_KEY, $args = [])
	{
		$args['user'] = $this->user;
		$args['userinfo'] = $this->user->getUserInfo();
		$args['actions'] = $this->actions;
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