<?php

namespace App\Enums;

class EHobbyGroupActions extends EBaseActionNames
{
	const CONTROLLER_NAME = "hobbygroup";

	static function edit($controllerName = self::CONTROLLER_NAME)
	{
		return parent::edit($controllerName); // TODO: Change the autogenerated stub
	}

	static function delete($controllerName = self::CONTROLLER_NAME)
	{
		return parent::delete($controllerName); // TODO: Change the autogenerated stub
	}

	static function detail($controllerName = self::CONTROLLER_NAME)
	{
		return parent::detail($controllerName); // TODO: Change the autogenerated stub
	}

	static function grid($controllerName = self::CONTROLLER_NAME)
	{
		return parent::grid($controllerName); // TODO: Change the autogenerated stub
	}

}