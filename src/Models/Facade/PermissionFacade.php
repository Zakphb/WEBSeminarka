<?php

namespace App\Models\Facade;

use App\Entities\Database\Object\PermissionObjectEntity;
use App\Enums\EControllerNames;
use App\Models\Database\PermissionDatabase;

/**
 *
 */
class PermissionFacade
{
	private PermissionDatabase $permissionDatabase;

	/**
	 * @param PermissionDatabase $permissionDatabase
	 */
	public function __construct(PermissionDatabase $permissionDatabase)
	{
		$this->permissionDatabase = $permissionDatabase;
	}

	/**
	 * @param $formVariables
	 * @return string
	 */
	public function savePermission($formVariables):string
	{
		return $this->permissionDatabase->save($formVariables);
	}

	/**
	 * @return array
	 */
	public function getAllPermissions(): array
	{
		return $this->permissionDatabase->getAll();
	}

	/**
	 * @param int $id
	 * @return PermissionObjectEntity
	 */
	public function getPermissionById(int $id): PermissionObjectEntity
	{
		return $this->permissionDatabase->getById($id);
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function deletePermissionById(int $id): bool{
		return $this->permissionDatabase->deleteById($id);
	}

	/**
	 * @return array
	 */
	public function getControllersForPermissions(){
		return EControllerNames::NAMES;
	}


}