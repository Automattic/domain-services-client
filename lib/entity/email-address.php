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

namespace Automattic\Domain_Services_Client\Entity;

/**
 * Represents an email address
 */
class Email_Address {
	/**
	 * The email address string
	 *
	 * @var string
	 */
	private string $email_address;

	/**
	 * Constructs an `Email_Address` entity
	 *
	 * @param string $email_address
	 */
	public function __construct( string $email_address ) {
		$this->email_address = $email_address;
	}

	/**
	 * Returns the email address
	 *
	 * @return string
	 */
	public function get_email_address(): string {
		return $this->email_address;
	}

	/**
	 * Returns the string representation of the `Email_Address` object
	 *
	 * @internal
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->get_email_address();
	}
}
