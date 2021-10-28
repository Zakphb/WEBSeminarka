<?php

namespace App\Entities;

class RegisterFormEntity extends BaseEntity
{
	const REGISTER_NAME = 'name';
	const REGISTER_SURNAME = 'surname';
	const REGISTER_EMAIL = 'email';
	const REGISTER_PASSWORD = 'password';
	const REGISTER_TEACHER = 'teacher';

	const COLUMN_NAMES = [
		self::REGISTER_NAME,
		self::REGISTER_SURNAME,
		self::REGISTER_EMAIL,
		self::REGISTER_PASSWORD,
		self::REGISTER_TEACHER
	];

	private $name;
	private $surname;
	private $email;
	private $password;
	private ?bool $teacher;


	public function __construct($name, $surname, $email, $password, ?bool $teacher = false)
	{
		parent::__construct();
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
		$this->password = $password;
		$this->teacher = $teacher;
	}

	public function toArray(): array
	{
		return [
			self::REGISTER_NAME => $this->name,
			self::REGISTER_SURNAME => $this->surname,
			self::REGISTER_EMAIL => $this->email,
			self::REGISTER_PASSWORD => $this->password,
			self::REGISTER_TEACHER => $this->teacher
		];
	}

	public static function constructFromArray(array $params): RegisterFormEntity
	{

		return new RegisterFormEntity($params[self::REGISTER_NAME], $params[self::REGISTER_SURNAME], $params[self::REGISTER_EMAIL], $params[self::REGISTER_PASSWORD], $params[self::REGISTER_TEACHER] ?: null);

	}


	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getSurname()
	{
		return $this->surname;
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

	/**
	 * @return bool|null
	 */
	public function getTeacher(): ?bool
	{
		return $this->teacher;
	}
}