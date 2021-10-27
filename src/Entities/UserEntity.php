<?php

namespace App\Entities;

class UserEntity extends BaseEntity
{
	const USER_ID = 'id';
	const USER_NAME = 'name';
	const USER_SURNAME = 'surname';
	const USER_EMAIL = 'email';
	const USER_PASSWORD = 'password';
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
}