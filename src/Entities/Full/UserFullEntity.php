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
	const USER_ROLE = "role_id";

	private $email;
	private $password;
	private ?int $id;
	private ?string $name;
	private ?string $surname;
	private ?int $role;
	private ?bool $teacher;


	public function __construct($email, $password,?int $id = null,?string $name = null, ?string $surname = null,?int $role = null,?bool $teacher = false)
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

	public static function constructFromArray(array $params)
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
	 * @return int|null
	 */
	public function getRole(): ?int
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



}