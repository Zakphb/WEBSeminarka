<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\RoleToPermissionDecompEntity;
use App\Entities\Database\Object\RoleObjectEntity;
use App\Entities\Full\RoleFullEntity;
use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\RoleToPermissionDatabase;

/**
 *
 */
class RoleFacade
{
	private RoleDatabase $roleDatabase;
	private RoleToPermissionDatabase $roleToPermissionDatabase;
	private PermissionDatabase $permissionDatabase;

	/**
	 * @param RoleDatabase $roleDatabase
	 * @param RoleToPermissionDatabase $roleToPermissionDatabase
	 * @param PermissionDatabase $permissionDatabase
	 */
	public function __construct(RoleDatabase $roleDatabase, RoleToPermissionDatabase $roleToPermissionDatabase, PermissionDatabase $permissionDatabase)
	{
		$this->roleDatabase = $roleDatabase;
		$this->roleToPermissionDatabase = $roleToPermissionDatabase;
		$this->permissionDatabase = $permissionDatabase;
	}

	/**
	 * @param $formVariables
	 * @return string
	 */
	public function saveRole($formVariables): string
	{
		foreach ($formVariables["permission"] as $permission)
		{
			$roleToPermission = new RoleToPermissionDecompEntity();
			$roleToPermission->setRoleId($formVariables[RoleObjectEntity::BASE_ID]);
			$roleToPermission->setPermissionId($permission);
			$this->roleToPermissionDatabase->save($roleToPermission->toArray());
		}
		unset($formVariables['permission']);
		return $this->roleDatabase->save($formVariables);
	}

	/**
	 * @return array
	 */
	public function getAllRoles(): array
	{
		return $this->roleDatabase->getAll();
	}

	/**
	 * @param int $id
	 * @return RoleObjectEntity
	 */
	public function getRoleById(int $id): RoleObjectEntity
	{
		return $this->roleDatabase->getById($id);
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deleteRoleById(int $id): bool
	{
		return $this->roleDatabase->deleteById($id);
	}

	/**
	 * @param $roleId
	 * @return RoleFullEntity
	 */
	public function getFullRoleWithPermissions($roleId): RoleFullEntity
	{
		$role = $this->roleDatabase->getById($roleId);
		$permissions = $this->getFullPermissions($roleId);
		return new RoleFullEntity($roleId, $role->getName(), $permissions);
	}

	/**
	 * @param $roleId
	 * @return array
	 */
	public function getFullPermissions($roleId)
	{
		$roleToPermissions = $this->roleToPermissionDatabase->getWhere([RoleToPermissionDecompEntity::ROLE_TO_PERMISSION_ROLE_ID => $roleId], 100);
		$arr = [];

		foreach ($roleToPermissions as $roleToPermission){
			$permissionId = RoleToPermissionDecompEntity::ROLE_TO_PERMISSION_PERMISSION_ID;
			$arr[] = $this->permissionDatabase->getById($roleToPermission->$permissionId);
		}
		return $arr;
	}

}