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

	const ALWAYS_ALLOWED_ACTIONS = [
		self::DETAIL,
		self::LOGIN,
		self::REGISTER,
		self::LOGOUT,
		self::SHOW];
	const NEED_TO_CHECK_ACTIONS = [
		self::EDIT,
		self::DELETE,
		self::GRID,
	];

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function edit(string $controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::EDIT;
	}

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function delete(string $controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::DELETE;
	}

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function detail(string $controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::DETAIL;
	}

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function grid(string $controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName . '.' . self::GRID;
	}

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function login(string $controllerName = 'login')
	{
		return $controllerName . '.' . self::LOGIN;
	}

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function register(string $controllerName = 'login')
	{
		return $controllerName . '.' . self::REGISTER;
	}

	/**
	 * @param string $controllerName
	 * @return string
	 */
	static function logout(string $controllerName = 'login')
	{
		return $controllerName . '.' . self::LOGOUT;
	}

	/**
	 * @param string $controllerName
	 * @return mixed|string
	 */
	static function show(string $controllerName = self::CONTROLLER_NAME)
	{
		return $controllerName;
	}
}