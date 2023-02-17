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

namespace Automattic\Domain_Services_Client\Exception;

use Automattic\Domain_Services_Client\{Response};

/**
 * Base class for all DSAPI exceptions.
 */
class Domain_Services_Exception extends \Exception {
	private array $data;

	/**
	 * Constructs a `Domain_Services_Exception` object.
	 *
	 * @internal
	 */
	public function __construct( int $code, array $data, \Throwable $previous = null ) {
		$this->data = $data;
		parent::__construct( Response\Code::get_description( $code ), $code, $previous );
	}

	/**
	 * Returns the error data associated with the exception
	 *
	 * @return array
	 */
	public function get_error_data(): array {
		return $this->data;
	}
}
