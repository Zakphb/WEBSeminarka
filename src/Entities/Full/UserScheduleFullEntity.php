<?php

namespace App\Entities\Full;

class UserScheduleFullEntity extends BaseFullEntity
{
	const USER_ID = 'id';
	const USER_NAME = 'name';
	const USER_SURNAME = 'surname';
	const USER_EMAIL = 'email';
	const USER_PASSWORD = 'password';
	const USER_ROLE = "role";
	const USER_IS_ALLOWED = "is_allowed";
	const USER_NOT_ALLOWED_NOTE = "not_allowed_note";
	const USER_HOBBYGROUP_ID = 'hobby_group_id';

	private $email;
	private $password;
	private string $name;
	private string $surname;
	private RoleFullEntity $role;
	private $isAllowed;
	private $notAllowedNote;
	private $hobbygroupId;


	/**
	 * @param $email
	 * @param $password
	 * @param int $id
	 * @param string $name
	 * @param string $surname
	 * @param RoleFullEntity $role
	 * @param $isAllowed
	 * @param $notAllowedNote
	 * @param int $hobbygroupId
	 */
	public function __construct($email, $password, int $id, string $name, string $surname, RoleFullEntity $role, $isAllowed, $notAllowedNote, $hobbygroupId = 0)
	{
		parent::__construct();

		$this->email = $email;
		$this->password = $password;
		$this->id = $id;
		$this->name = $name;
		$this->surname = $surname;
		$this->role = $role;
		$this->isAllowed = $isAllowed;
		$this->notAllowedNote = $notAllowedNote;
		$this->hobbygroupId = $hobbygroupId;
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
			self::USER_PASSWORD => $this->password,
			self::USER_ROLE => $this->role,
			self::USER_IS_ALLOWED => $this->isAllowed,
			self::USER_NOT_ALLOWED_NOTE => $this->notAllowedNote,
			self::USER_HOBBYGROUP_ID => $this->hobbygroupId
		];
	}

	/**
	 * @param array $params
	 * @return UserScheduleFullEntity
	 */
	public static function constructFromArray(array $params): UserScheduleFullEntity
	{
		if (!isset($params[self::USER_HOBBYGROUP_ID])){
			$params[self::USER_HOBBYGROUP_ID] = null;
		}
		return new UserScheduleFullEntity($params[self::USER_EMAIL], $params[self::USER_PASSWORD], $params[self::USER_ID], $params[self::USER_NAME], $params[self::USER_SURNAME], $params[self::USER_ROLE], $params[UserScheduleFullEntity::USER_IS_ALLOWED], $params[UserScheduleFullEntity::USER_NOT_ALLOWED_NOTE], $params[self::USER_HOBBYGROUP_ID]);
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

	/**
	 * @return mixed
	 */
	public function getIsAllowed()
	{
		return $this->isAllowed;
	}

	/**
	 * @return mixed
	 */
	public function getNotAllowedNote()
	{
		return $this->notAllowedNote;
	}/**
 * @return mixed
 */public function getHobbygroupId()
{
	return $this->hobbygroupId;
}
}