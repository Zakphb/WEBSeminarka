<?php

namespace App\Enums\ActionConstructors;

class EHomeConstructor extends EBaseActionConstructor
{
	const CONTROLLER_NAME = "/";
	static function show(string $controllerName = self::CONTROLLER_NAME)
	{
		return parent::show($controllerName); // TODO: Change the autogenerated stub
	}

}