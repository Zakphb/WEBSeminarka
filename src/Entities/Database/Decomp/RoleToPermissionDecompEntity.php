<?php

namespace App\Entities\Database\Decomp;

class RoleToPermissionDecompEntity extends BaseDecompEntity
{
	const ROLE_TO_PERMISSION_PERMISSION_ID = 'permission_id';
	const ROLE_TO_PERMISSION_ROLE_ID = 'role_id';

	const COLUMN_NAMES = [
		self::ROLE_TO_PERMISSION_PERMISSION_ID,
		self::ROLE_TO_PERMISSION_ROLE_ID
	];
	protected int $permissionId;
	protected int $roleId;

	public function toArray(): array
	{
		return [
			self::ROLE_TO_PERMISSION_PERMISSION_ID => $this->permissionId,
			self::ROLE_TO_PERMISSION_ROLE_ID => $this->roleId
		];
	}

	/**
	 * @param int $permissionId
	 */
	public function setPermissionId(int $permissionId): void
	{
		$this->permissionId = $permissionId;
	}

	/**
	 * @param int $roleId
	 */
	public function setRoleId(int $roleId): void
	{
		$this->roleId = $roleId;
	}

	/**
	 * @return int
	 */
	public function getPermissionId(): int
	{
		return $this->permissionId;
	}

	/**
	 * @return int
	 */
	public function getRoleId(): int
	{
		return $this->roleId;
	}


}