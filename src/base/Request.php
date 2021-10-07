<?php

class Request
{
	/**
	 * @return false|mixed|string
	 */
	public function getPath()
	{
		$path = $_SERVER['REQUEST_URI'] ?? '/';
		$position = strpos($path, '?');
		$position ? $path = substr($path, 0, $position) : $path;

		return $path;
	}

	/**
	 * @return string
	 */
	public function getMethod()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}