<?php

namespace App\Utilities;

class RedirectUtils
{
	const BASE_URL = "http://localhost/";
	const LOGIN_URL = "http://localhost/login";

	/**
	 * @param string $url
	 * @param int $statusCode
	 */
	public static function redirect($url = self::BASE_URL, $statusCode = 303): void
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}

	/**
	 * @param null $action
	 * @param null $params
	 * @param int $statusCode
	 */
	public static function redirectWithURLBuild($action = null, $params = null, $statusCode = 303)
	{
		$url = self::BASE_URL;
		if ($action)
		{
			$url .= $action;
		}
		if ($params)
		{
			$url .= "?";
			$count = count($params);
			$counter = 0;
			foreach ($params as $key => $value)
			{
				if ($counter<$count-1){
					$url .= "$key=$value&";
				} else {
					$url .= "$key=$value";
				}
				$counter++;
			}
		}
		self::redirect($url, $statusCode);
	}


	public static function redirectToLogin(){
		self::redirect(self::LOGIN_URL);
	}
}