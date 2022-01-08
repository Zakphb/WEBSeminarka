<?php

namespace App\Utilities;

use DateTime;

class DateTimeUtility
{
	/**
	 * @param $datetimestring
	 * @return string
	 */
	static function getDateTime($datetimestring)
	{
		$datetimestring = $datetimestring.':00';
		$datetimestring = str_replace('/', '-', $datetimestring);
		return DateTime::createFromFormat('d-m-Y H:i:s', $datetimestring)->format(DATE_ATOM);

	}
}