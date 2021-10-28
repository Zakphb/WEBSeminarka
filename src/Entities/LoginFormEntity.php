<?php

namespace App\Entities;

class LoginFormEntity extends BaseEntity
{
	const LOGIN_EMAIL = 'email';
	const LOGIN_PASSWORD = 'password';

	const COLUMN_NAMES = [
		self::LOGIN_EMAIL,
		self::LOGIN_PASSWORD,
	];

	private $email;
	private $password;


	public function __construct($email, $password)
	{
		parent::__construct();
		$this->email = $email;
		$this->password = $password;
	}

	public function toArray(): array
	{
		return [
			self::LOGIN_EMAIL => $this->email,
			self::LOGIN_PASSWORD => $this->password,
		];
	}

	public static function constructFromArray(array $params): LoginFormEntity
	{

		return new LoginFormEntity($params[self::LOGIN_EMAIL], $params[self::LOGIN_PASSWORD]);

	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}


}