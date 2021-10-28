<?php

namespace App\Entities;

class UserEntity extends BaseEntity
{
	const USER_ID = 'id';
	const USER_NAME = 'name';
	const USER_SURNAME = 'surname';
	const USER_EMAIL = 'email';
	const USER_PASSWORD = 'password';

	const COLUMN_NAMES = [
		self::USER_ID,
		self::USER_NAME,
		self::USER_SURNAME,
		self::USER_EMAIL,
		self::USER_PASSWORD
	];

	private ?int $id;
	private $name;
	private $surname;
	private $email;
	private $password;


	public function __construct(?int $id, $name, $surname, $email, $password)
	{
		parent::__construct();
		$this->id = $id;
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
		$this->password = $password;
	}

	public function toArray(): array
	{
		return [
			self::USER_ID => $this->id,
			self::USER_NAME => $this->name,
			self::USER_SURNAME => $this->surname,
			self::USER_EMAIL => $this->email,
			self::USER_PASSWORD => $this->password
		];
	}

	public static function constructFromArray(array $params): UserEntity
	{
		return new UserEntity($params[self::USER_ID] ?: null, $params[self::USER_NAME], $params[self::USER_SURNAME], $params[self::USER_EMAIL], $params[self::USER_PASSWORD]);
	}
}