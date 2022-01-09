<?php

namespace App\Entities\Full;

class RoleFullEntity extends BaseFullEntity
{
	const ID = 'id';
	const ROLE_NAME = 'name';
	private $permissions = [];
	private $name;
	public function __construct(int $id, $name, array $permissions)
	{
		parent::__construct();
		$this->id = $id;
		$this->name = $name;
		$this->permissions = $permissions;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [];
	}

	/**
	 * @param array $params
	 */
	public static function constructFromArray(array $params)
	{
		return parent::constructFromArray($params); // TODO: Change the autogenerated stub
	}

	/**
	 * @return array
	 */
	public function getPermisions(): array
	{
		return $this->permissions;
	}

	/**
	 * @param array $permissions
	 */
	public function setPermisions(array $permissions): void
	{
		$this->permissions = $permissions;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): void
	{
		$this->name = $name;
	}


}