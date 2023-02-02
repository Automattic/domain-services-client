<?php declare( strict_types=1 );
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

namespace Automattic\Domain_Services_Client\Exception\Entity;

use Automattic\Domain_Services_Client\{Exception, Response};

/**
 * Exception thrown when an invalid value/option is passed to the entity.
 */
class Invalid_Value_Exception extends Exception\Domain_Services_Exception {
	/**
	 * Constructs a `Invalid_Value_Exception` object.
	 *
	 * @internal
	 */
	public function __construct( string $invalid_option, string $reason = '' ) {
		parent::__construct( Response\Code::INVALID_ENTITY_VALUE, [ 'invalid_option' => $invalid_option, 'reason' => $reason ] );
	}

	/**
	 * Returns the type of exception - associative array with exception class and subclass
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function get_exception_type(): array {
		return [
			'class' => 'Entity',
			'subclass' => 'Invalid_Value',
		];
	}
}
