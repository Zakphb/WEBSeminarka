<?php

namespace App\Models\Facade;

use App\Models\Database\UserDatabase;

class UserFacade
{
	private UserDatabase $userDatabase;

	public function __construct(UserDatabase $userDatabase)
	{
		$this->userDatabase = $userDatabase;
	}
}