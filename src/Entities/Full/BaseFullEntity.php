<?php

namespace App\Entities\Full;

use App\Entities\Database\Object\BaseObjectEntity;

abstract class BaseFullEntity extends BaseObjectEntity
{
	/**
	 *
	 */
	public function __construct()
	{
	}

	/**
	 * @param array $params
	 */
	public static function constructFromArray(array $params)
	{

	}
}