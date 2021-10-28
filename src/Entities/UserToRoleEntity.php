<?php

namespace App\Entities;

class UserToRoleEntity extends BaseEntity
{
	const USER_TO_ROLE_USER_ID = 'user_id';
	const USER_TO_ROLE_ROLE_ID = 'role_id';

	const COLUMN_NAMES = [
		self::USER_TO_ROLE_USER_ID,
		self::USER_TO_ROLE_ROLE_ID
	];
	private int $userId;
	private int $roleId;


	public function __construct(int $userId, int $roleId)
	{
		parent::__construct();

		$this->userId = $userId;
		$this->roleId = $roleId;
	}

	public function toArray(): array
	{
		return [
			self::USER_TO_ROLE_USER_ID => $this->userId,
			self::USER_TO_ROLE_ROLE_ID => $this->roleId
		];
	}

	public static function constructFromArray(array $params): UserToRoleEntity
	{
		return new UserToRoleEntity($params[self::USER_TO_ROLE_USER_ID], $params[self::USER_TO_ROLE_ROLE_ID]);
	}
}