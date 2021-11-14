<?php

namespace App\Entities;

class UserFullEntity extends UserEntity
{

	const USER_ROLE = "role_id";
	private $role;

	public function __construct(?int $id, $name, $surname, $email, $password,int $role)
	{
		parent::__construct($id, $name, $surname, $email, $password);
		$this->role = $role;
	}

	public function toArray(): array
	{
		return [
			self::USER_ID => $this->id,
			self::USER_NAME => $this->name,
			self::USER_SURNAME => $this->surname,
			self::USER_EMAIL => $this->email,
			self::USER_PASSWORD => $this->password,
			self::USER_ROLE => $this->role
		];
	}

	public static function constructFromArray(array $params): UserFullEntity
	{
		return new UserFullEntity($params[self::USER_ID] ?: null, $params[self::USER_NAME], $params[self::USER_SURNAME], $params[self::USER_EMAIL], $params[self::USER_PASSWORD], $params[self::USER_ROLE]);
	}
}