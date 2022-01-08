<?php

namespace App\Utilities;

class StringUtils
{
	/**
	 * @param $str
	 * @return string
	 */
	static function addQuotes($str) {
		return sprintf("'%s'", $str);
	}
}