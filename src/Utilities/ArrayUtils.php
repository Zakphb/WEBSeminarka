<?php

namespace App\Utilities;

class ArrayUtils
{
	static function isMultidimensional(array $array): bool
	{
		return count($array) !== count($array, COUNT_RECURSIVE);
	}

	static function arrayIntoQueryArgs(array $array, ?bool $quote = false): string
	{
		if ($quote){
			foreach ($array as $key => $value)
			{
				$array[$key] = StringUtils::addQuotes($value);
			}
		}
		return implode(",", $array);
	}

}