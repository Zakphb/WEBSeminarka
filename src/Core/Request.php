<?php

namespace App\Core;

use http\Params;

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

	public function getFunction()
	{
		return $this->processUri(self::CHOP_FUNCTION);
	}

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
				break;
			case self::CHOP_FUNCTION:
				$path = substr($uri, 0, $functionPosition);
				if ($functionPosition)
				{
					$function = substr($uri, strlen($path)+1, strlen($uri)); //+1 kvuli tecce
				} else
				{
					$function = false;
				}
				return $function;
				break;
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