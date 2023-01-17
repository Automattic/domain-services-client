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
 * Represents the verification data of contact associated with a domain
 */
class Contact_Verification_Data {
	/**
	 * The verification code used to verify a contact.
	 *
	 * @var string
	 */
	private string $code;

	/**
	 * Constructs a Contact_Verification_Data entity
	 *
	 * @param string $code
	 */
	public function __construct( string $code ) {
		$this->code = $code;
	}

	/**
	 * Returns the verification code
	 *
	 * @return string
	 */
	public function get_code(): string {
		return $this->code;
	}
}
