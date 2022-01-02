<?php

namespace App\Models\Facade;

use App\Entities\Database\Object\PermissionObjectEntity;
use App\Enums\EControllerNames;
use App\Models\Database\PermissionDatabase;

class PermissionFacade
{
	private PermissionDatabase $permissionDatabase;

	public function __construct(PermissionDatabase $permissionDatabase)
	{
		$this->permissionDatabase = $permissionDatabase;
	}

	public function savePermission($formVariables):string
	{
		return $this->permissionDatabase->save($formVariables);
	}

	public function getAllPermissions(): array
	{
		return $this->permissionDatabase->getAll();
	}

	public function getPermissionById(int $id): PermissionObjectEntity
	{
		return $this->permissionDatabase->getById($id);
	}

	public function deletePermissionById(int $id): bool{
		return $this->permissionDatabase->deleteById($id);
	}

	public function getControllersForPermissions(){
		return EControllerNames::NAMES;
	}


}