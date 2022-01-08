<?php

namespace App\Entities\Database\Decomp;

class UserToRoleDecompEntity extends BaseDecompEntity
{
	const USER_TO_ROLE_USER_ID = 'user_id';
	const USER_TO_ROLE_ROLE_ID = 'role_id';

	const COLUMN_NAMES = [
		self::USER_TO_ROLE_USER_ID,
		self::USER_TO_ROLE_ROLE_ID
	];
	private int $userId;
	private int $roleId;

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			self::USER_TO_ROLE_USER_ID => $this->userId,
			self::USER_TO_ROLE_ROLE_ID => $this->roleId
		];
	}

	/**
	 * @return int
	 */
	public function getUserId(): int
	{
		return $this->userId;
	}

	/**
	 * @param int $userId
	 */
	public function setUserId(int $userId): void
	{
		$this->userId = $userId;
	}

	/**
	 * @return int
	 */
	public function getRoleId(): int
	{
		return $this->roleId;
	}

	/**
	 * @param int $roleId
	 */
	public function setRoleId(int $roleId): void
	{
		$this->roleId = $roleId;
	}

}