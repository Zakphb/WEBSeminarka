<?php

namespace App\Utilities;


use DateTime;

class DateTimeUtility
{
	const CZECH_FORMAT = 'd-m-Y H:i:s';
	const CZECH_FORMAT_DATE = 'd-m-Y';
	const CZECH_FORMAT_HOURS = 'H:i';
	const DB_FORMAT = 'Y-m-d H:i:s';
	const DATE = 'date';
	const INTERVAL = 'interval';
	const HOURS = 'hours';
	/**
	 * @param $datetimestring
	 * @return string
	 */
	static function getDateTime($datetimestring)
	{
		$datetimestring .= ':00';
		$datetimestring = str_replace('/', '-', $datetimestring);
		return DateTime::createFromFormat(self::CZECH_FORMAT, $datetimestring)->format(DATE_ATOM);
	}

	static function getDuration($datetimestart, $datetimeend)
	{
		$datetimestart = DateTime::createFromFormat(self::DB_FORMAT, $datetimestart);
		$datetimeend = DateTime::createFromFormat(self::DB_FORMAT, $datetimeend);
		$duration[self::INTERVAL] = $datetimeend->diff($datetimestart);
		$duration[self::DATE] = $datetimestart->format(self::CZECH_FORMAT_DATE);
		$duration[self::HOURS] = $datetimestart->format(self::CZECH_FORMAT_HOURS);
		return $duration;
	}

	static function convertDatabaseToCzech($time){
		$time =  DateTime::createFromFormat(self::DB_FORMAT, $time);
		return $time->format(self::CZECH_FORMAT);
	}
}