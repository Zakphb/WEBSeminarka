<?php

namespace App\Entities\Database\Object;

class UserObjectEntity extends BaseObjectEntity
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

	protected ?int $id;
	protected $name;
	protected $surname;
	protected $email;
	protected $password;


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

	/**
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @param int|null $id
	 */
	public function setId(?int $id): void
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

	/**
	 * @return mixed
	 */
	public function getSurname()
	{
		return $this->surname;
	}

	/**
	 * @param mixed $surname
	 */
	public function setSurname($surname): void
	{
		$this->surname = $surname;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email): void
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): void
	{
		$this->password = $password;
	}


}