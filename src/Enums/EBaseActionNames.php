<?php

namespace App\Enums;

class EBaseActionNames
{
	public const EDIT = 'actionEdit';
	public const DELETE = 'actionDelete';
	public const DETAIL = 'actionDetail';
	public const GRID = 'actionGrid';
	public const LOGIN = 'actionLogin';
	public const REGISTER = 'actionRegister';
	public const LOGOUT = 'actionLogout';

	static function edit($controllerName)
	{
		return $controllerName . '.' . self::EDIT;
	}

	static function delete($controllerName)
	{
		return $controllerName . '.' . self::DELETE;
	}

	static function detail($controllerName)
	{
		return $controllerName . '.' . self::DETAIL;
	}

	static function grid($controllerName)
	{
		return $controllerName . '.' . self::GRID;
	}

	static function login($controllerName = 'login')
	{
		return $controllerName . '.' . self::LOGIN;
	}

	static function register($controllerName = 'login')
	{
		return $controllerName . '.' . self::REGISTER;
	}

	static function logout($controllerName = 'login')
	{
		return $controllerName . '.' . self::LOGOUT;
	}
}