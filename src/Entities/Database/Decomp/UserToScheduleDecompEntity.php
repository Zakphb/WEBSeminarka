<?php

namespace App\Entities\Database\Decomp;

use App\Entities\Database\Object\BaseObjectEntity;

class UserToScheduleDecompEntity extends BaseDecompEntity
{
	const USER_TO_SCHEDULE_ID = 'id';
	const USER_TO_SCHEDULE_USER_ID = 'user_id';
	const USER_TO_SCHEDULE_SCHEDULE_ID = 'schedule_id';
	const USER_TO_SCHEDULE_IS_ALLOWED = 'is_allowed';
	const USER_TO_SCHEDULE_NOTE = 'note';
	const USER_TO_SCHEDULE_IS_LOGGED_IN = 'is_logged_in';

	const COLUMN_NAMES = [
		self::USER_TO_SCHEDULE_ID,
		self::USER_TO_SCHEDULE_USER_ID,
		self::USER_TO_SCHEDULE_SCHEDULE_ID,
		self::USER_TO_SCHEDULE_IS_ALLOWED,
		self::USER_TO_SCHEDULE_NOTE,
		self::USER_TO_SCHEDULE_IS_LOGGED_IN
	];

	protected int $id;
	protected int $userId;
	protected int $roleId;
	protected $isAllowed;
	protected $note;
	protected $isLoggedIn;

	public function toArray(): array
	{
		return [
			self::USER_TO_SCHEDULE_ID => $this->id,
			self::USER_TO_SCHEDULE_USER_ID => $this->userId,
			self::USER_TO_SCHEDULE_SCHEDULE_ID => $this->roleId,
			self::USER_TO_SCHEDULE_IS_ALLOWED => $this->isAllowed,
			self::USER_TO_SCHEDULE_NOTE => $this->note,
			self::USER_TO_SCHEDULE_IS_LOGGED_IN => $this->isLoggedIn
		];
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getUserId(): int
	{
		return $this->userId;
	}

	/**
	 * @return int
	 */
	public function getRoleId(): int
	{
		return $this->roleId;
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
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * @return mixed
	 */
	public function getIsLoggedIn()
	{
		return $this->isLoggedIn;
	}

}