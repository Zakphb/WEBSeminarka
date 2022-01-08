<?php

namespace App\Utilities;

class Response
{
	private bool $success;
	private string $message;
	private ?string $redirect;

	/**
	 * @param bool $success
	 * @param string $message
	 * @param string|null $redirect
	 */
	public function __construct(bool $success, string $message,?string $redirect = null)
	{
		$this->success = $success;
		$this->message = $message;
		$this->redirect = $redirect;
	}

	/**
	 * @return string|null
	 */
	public function getRedirect(): ?string
	{
		return $this->redirect;
	}

	/**
	 * @return bool
	 */
	public function isSuccess(): bool
	{
		return $this->success;
	}

	/**
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
	}
}