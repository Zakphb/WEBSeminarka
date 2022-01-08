<?php

namespace App\Core;


/**
 *
 */
class Request
{
	const CHOP_PATH = 'path';
	const CHOP_FUNCTION = 'function';

	/**
	 * @return false|mixed|string
	 */
	public function getPath()
	{
		return $this->processUri(self::CHOP_PATH);
	}

	/**
	 * @return false|mixed|string|void
	 */
	public function getFunction()
	{
		return $this->processUri(self::CHOP_FUNCTION);
	}

	/**
	 * @param string $chop
	 * @return false|mixed|string|void
	 */
	private function processUri(string $chop)
	{
		$uri = $_SERVER['REQUEST_URI'] ?? '/';
		$argsPosition = strpos($uri, '?');
		$functionPosition = strpos($uri, '.');

		switch ($chop)
		{
			case self::CHOP_PATH:
				if ($functionPosition)
				{
					$path = substr($uri, 0, $functionPosition);
				} else
				{
					if ($argsPosition)
					{
						$path = substr($uri, 0, $argsPosition);
					} else
					{
						$path = $uri;
					}
				}
				return $path;
			case self::CHOP_FUNCTION:
				$path = substr($uri, 0, $functionPosition);
				if ($functionPosition)
				{
					if ($argsPosition)
					{
						$start = min(strlen($path) + 1, $argsPosition);
						$length = abs(strlen($path) + 1 - $argsPosition);
						$function = substr($uri, $start, $length);
					} else {
						$function = substr($uri, strlen($path) + 1, strlen($uri));
					}
				} else
				{
					$function = false;
				}
				return $function;
		}
	}

	/**
	 * @return string
	 */
	public function getMethod()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
}