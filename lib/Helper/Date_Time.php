<?php
declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

namespace Automattic\Domain_Services\Helper;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

class Date_Time {
	private const FORMAT = 'Y-m-d H:i:s';

	/**
	 * Returns the DateTime format used by the client
	 *
	 * @return string
	 */
	public static function get_format(): string {
		return self::FORMAT;
	}

	/**
	 * Formats either a DateTime or a DateTimeImmutable object into a string
	 *
	 * @param DateTimeInterface $datetime
	 *
	 * @return string
	 */
	public static function format( DateTimeInterface $datetime ): string {
		return $datetime->format( self::FORMAT );
	}

	/**
	 * Creates a DateTime instance from string
	 *
	 * @param string $datetime
	 *
	 * @return DateTime|false
	 */
	public static function create( string $datetime ) {
		return DateTime::createFromFormat( self::FORMAT, $datetime );
	}

	/**
	 * Creates a DateTimeImmutable instance from a string
	 *
	 * @param string $datetime
	 *
	 * @return DateTimeImmutable|false
	 */
	public static function createImmutable( string $datetime ) {
		return DateTimeImmutable::createFromFormat( self::FORMAT, $datetime );
	}
}
