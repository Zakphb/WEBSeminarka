<?php

namespace App\Enums\ActionConstructors;

class EBaseActionConstructor
{
	const CONTROLLER_NAME = '';

	public const EDIT = 'actionEdit';
	public const DELETE = 'actionDelete';
	public const DETAIL = 'actionDetail';
	public const GRID = 'actionGrid';
	public const LOGIN = 'actionLogin';
	public const REGISTER = 'actionRegister';
	public const LOGOUT = 'actionLogout';
	public const SHOW = 'show';

	static function edit($controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::EDIT;
	}

	static function delete($controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::DELETE;
	}

	static function detail($controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::DETAIL;
	}

	static function grid($controllerName = self::CONTROLLER_NAME)
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

	static function show($controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName;
	}
}