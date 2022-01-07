<?php

namespace App\Models\Database;

use App\Entities\Database\Decomp\UserToHobbyGroupDecompEntity;

class UserToHobbyGroupDatabase extends BaseDatabase
{
	const TABLE_NAME = "zakphb_user_to_hobby_group";
	const ENTITY_NAME = UserToHobbyGroupDecompEntity::class;

	public function __construct()
	{
		parent::__construct(self::TABLE_NAME, self::ENTITY_NAME);
	}
}