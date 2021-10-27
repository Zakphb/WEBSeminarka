<?php

namespace App\Models\Facade;

use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\UserDatabase;

class UserFacade
{
	private UserDatabase $userDatabase;
	private RoleDatabase $roleDatabase;
	private PermissionDatabase $permissionDatabase;

	public function __construct(UserDatabase $userDatabase, RoleDatabase $roleDatabase, PermissionDatabase $permissionDatabase)
	{
		$this->userDatabase = $userDatabase;
		$this->roleDatabase = $roleDatabase;
		$this->permissionDatabase = $permissionDatabase;
	}


	public function register($variables)
	{
		bdump($variables);
	}
}