<?php

namespace App\Enums;

use App\Enums\ActionConstructors\EHobbyGroupConstructor;
use App\Enums\ActionConstructors\EHomeConstructor;
use App\Enums\ActionConstructors\ELoginConstructor;
use App\Enums\ActionConstructors\EPermissionConstructor;
use App\Enums\ActionConstructors\ERoleConstructor;
use App\Enums\ActionConstructors\ESchoolroomConstructor;

class EControllerNames
{
	const HOBBY_GROUP = EHobbyGroupConstructor::CONTROLLER_NAME;
	const SCHOOLROOM = ESchoolroomConstructor::CONTROLLER_NAME;
	const LOGIN = ELoginConstructor::CONTROLLER_NAME;
	const PERMISSION = EPermissionConstructor::CONTROLLER_NAME;
	const ROLE = ERoleConstructor::CONTROLLER_NAME;
	const HOME = EHomeConstructor::CONTROLLER_NAME;

	const NAMES = [
		self::HOBBY_GROUP,
		self::SCHOOLROOM,
		self::LOGIN,
		self::PERMISSION,
		self::ROLE,
		self::HOME
	];

	const ALWAYSALLOWED = [
		self::LOGIN,
		self::HOME
	];

	const NEEDTOCHECK = [
		self::HOBBY_GROUP,
		self::SCHOOLROOM,
		self::PERMISSION,
		self::ROLE,
	];

	const CONTROLLERS = [
		EHobbyGroupConstructor::class,
		ESchoolroomConstructor::class,
		ELoginConstructor::class,
		EPermissionConstructor::class,
		ERoleConstructor::class,
		EHomeConstructor::class
	];
}