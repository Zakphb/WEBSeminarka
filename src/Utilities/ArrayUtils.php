<?php

namespace App\Utilities;

class ArrayUtils
{
	/**
	 * @param array $array
	 * @return bool
	 */
	static function isMultidimensional(array $array): bool
	{
		return count($array) !== count($array, COUNT_RECURSIVE);
	}

	/**
	 * @param array $array
	 * @param bool|null $quote
	 * @return string
	 */
	static function arrayIntoQueryArgs(array $array, ?bool $quote = false): string
	{
		if ($quote)
		{
			foreach ($array as $key => $value)
			{
				$array[$key] = StringUtils::addQuotes($value);
			}
		}
		return implode(",", $array);
	}

	/**
	 * @param array $arrayToChangeKeys
	 * @param array $newKeys
	 * @return array|false
	 */
	static function changeKey(array $arrayToChangeKeys, array $newKeys): array
	{
		return array_combine(array_map(function ($el) use ($newKeys)
		{
			return $el;
		}, array_values($newKeys)), array_values($arrayToChangeKeys));
	}

}