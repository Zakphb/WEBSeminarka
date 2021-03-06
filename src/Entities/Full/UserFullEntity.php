<?php

namespace App\Entities\Full;

class UserFullEntity extends BaseFullEntity
{
	const USER_ID = 'id';
	const USER_NAME = 'name';
	const USER_SURNAME = 'surname';
	const USER_EMAIL = 'email';
	const USER_ROLE = "role";
	const USER_PASSWORD = 'password';

	private $email;
	private $password;
	private string $name;
	private string $surname;
	private RoleFullEntity $role;

	/**
	 * @param $email
	 * @param int $id
	 * @param string $name
	 * @param string $surname
	 * @param RoleFullEntity $role
	 */
	public function __construct($email,int $id,string $name, string $surname,RoleFullEntity $role)
	{
		parent::__construct();

		$this->email = $email;
		$this->id = $id;
		$this->name = $name;
		$this->surname = $surname;
		$this->role = $role;
	}

	/**
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			self::USER_ID => $this->id,
			self::USER_NAME => $this->name,
			self::USER_SURNAME => $this->surname,
			self::USER_EMAIL => $this->email,
			self::USER_ROLE => $this->role
		];
	}

	/**
	 * @param array $params
	 * @return UserFullEntity
	 */
	public static function constructFromArray(array $params): UserFullEntity
	{
		return new UserFullEntity($params[self::USER_EMAIL], $params[self::USER_ID], $params[self::USER_NAME], $params[self::USER_SURNAME], $params[self::USER_ROLE]);
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
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @return string|null
	 */
	public function getName(): ?string
	{
		return $this->name;
	}

	/**
	 * @return string|null
	 */
	public function getSurname(): ?string
	{
		return $this->surname;
	}

	/**
	 * @return RoleFullEntity
	 */
	public function getRole(): RoleFullEntity
	{
		return $this->role;
	}


	/**
	 * @param mixed $email
	 */
	public function setEmail($email): void
	{
		$this->email = $email;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): void
	{
		$this->password = $password;
	}

	/**
	 * @param int|null $id
	 */
	public function setId(?int $id): void
	{
		$this->id = $id;
	}

	/**
	 * @param string|null $name
	 */
	public function setName(?string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @param string|null $surname
	 */
	public function setSurname(?string $surname): void
	{
		$this->surname = $surname;
	}

	/**
	 * @param RoleFullEntity $role
	 */
	public function setRole(RoleFullEntity $role): void
	{
		$this->role = $role;
	}


}