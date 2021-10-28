<?php

namespace App\Utilities;

class RedirectUtils
{
	public static function redirect($url, $statusCode = 303): void
	{
		header('Location: ' . $url, true, $statusCode);
		die();
	}
}