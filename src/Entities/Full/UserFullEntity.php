<?php

namespace App\Entities\Full;

class UserFullEntity extends BaseFullEntity
{
	const USER_ID = 'id';
	const USER_NAME = 'name';
	const USER_SURNAME = 'surname';
	const USER_EMAIL = 'email';
	const USER_PASSWORD = 'password';
	const USER_TEACHER = 'teacher';
	const USER_ROLE = "role";
	const USER_PERMISSIONS = 'permissions';

	private $email;
	private $password;
	private ?string $name;
	private ?string $surname;
	private ?RoleFullEntity $role;
	private ?bool $teacher;


	public function __construct($email, $password,?int $id = null,?string $name = null, ?string $surname = null,?RoleFullEntity $role = null,?bool $teacher = false)
	{
		parent::__construct();

		$this->email = $email;
		$this->password = $password;
		$this->id = $id;
		$this->name = $name;
		$this->surname = $surname;
		$this->role = $role;
		$this->teacher = $teacher;
	}

	public function toArray(): array
	{
		return [
			self::USER_ID => $this->id,
			self::USER_NAME => $this->name,
			self::USER_SURNAME => $this->surname,
			self::USER_EMAIL => $this->email,
			self::USER_PASSWORD => $this->password,
			self::USER_ROLE => $this->role,
			self::USER_TEACHER => $this->teacher
		];
	}

	public static function constructFromArray(array $params): UserFullEntity
	{
		return new UserFullEntity($params[self::USER_EMAIL],$params[self::USER_PASSWORD], $params[self::USER_ID], $params[self::USER_NAME], $params[self::USER_SURNAME], $params[self::USER_ROLE], $params[self::USER_TEACHER]);
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
	 * @return bool|null
	 */
	public function getTeacher(): ?bool
	{
		return $this->teacher;
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
	 * @param RoleFullEntity|null $role
	 */
	public function setRole(RoleFullEntity $role): void
	{
		$this->role = $role;
	}

	/**
	 * @param bool|null $teacher
	 */
	public function setTeacher(?bool $teacher): void
	{
		$this->teacher = $teacher;
	}

}