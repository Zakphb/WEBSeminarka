<?php

namespace App\Enums\ActionConstructors;

class EPermissionConstructor extends EBaseActionConstructor
{
	const CONTROLLER_NAME = "permission";
	static function edit(string $controllerName = self::CONTROLLER_NAME)
	{
		return parent::edit($controllerName); // TODO: Change the autogenerated stub
	}

	static function delete(string $controllerName = self::CONTROLLER_NAME)
	{
		return parent::delete($controllerName); // TODO: Change the autogenerated stub
	}

	static function detail(string $controllerName = self::CONTROLLER_NAME)
	{
		return parent::detail($controllerName); // TODO: Change the autogenerated stub
	}

	static function grid(string $controllerName = self::CONTROLLER_NAME)
	{
		return parent::grid($controllerName); // TODO: Change the autogenerated stub
	}

	static function show(string $controllerName = self::CONTROLLER_NAME)
	{
		return parent::show($controllerName); // TODO: Change the autogenerated stub
	}
}