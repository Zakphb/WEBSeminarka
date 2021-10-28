<?php

namespace App\Utilities;

class StringUtils
{
	static function addQuotes($str) {
		return sprintf("'%s'", $str);
	}
}