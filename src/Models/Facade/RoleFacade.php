<?php

namespace App\Models\Facade;

use App\Entities\Database\Decomp\RoleToPermissionDecompEntity;
use App\Entities\Database\Object\RoleObjectEntity;
use App\Entities\Full\RoleFullEntity;
use App\Models\Database\PermissionDatabase;
use App\Models\Database\RoleDatabase;
use App\Models\Database\RoleToPermissionDatabase;

class RoleFacade
{
	private RoleDatabase $roleDatabase;
	private RoleToPermissionDatabase $roleToPermissionDatabase;
	private PermissionDatabase $permissionDatabase;

	public function __construct(RoleDatabase $roleDatabase, RoleToPermissionDatabase $roleToPermissionDatabase, PermissionDatabase $permissionDatabase)
	{
		$this->roleDatabase = $roleDatabase;
		$this->roleToPermissionDatabase = $roleToPermissionDatabase;
		$this->permissionDatabase = $permissionDatabase;
	}

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

	public function getAllRoles(): array
	{
		return $this->roleDatabase->getAll();
	}

	public function getRoleById(int $id): RoleObjectEntity
	{
		return $this->roleDatabase->getById($id);
	}

	public function deleteRoleById(int $id): bool
	{
		return $this->roleDatabase->deleteById($id);
	}

	public function getFullRoleWithPermissions($roleId): RoleFullEntity
	{
		$role = $this->roleDatabase->getById($roleId);
		$permissions = $this->getFullPermissions($roleId);
		return new RoleFullEntity($roleId, $role->getName(), $permissions);
	}

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