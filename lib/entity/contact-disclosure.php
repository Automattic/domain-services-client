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

use Automattic\Domain_Services_Client\{Exception};

/**
 * The list of domain contact fields to disclose in the Whois results
 */
class Contact_Disclosure {
	public const NONE = 'none';
	public const ALL = 'all';

	public const VALID_DISCLOSURE_SETTINGS = [
		self::NONE,
		self::ALL,
	];

	/**
	 * The contact fields to disclose.
	 *
	 * @var string
	 */
	private string $disclose_fields;

	/**
	 * Constructs a Contact_Disclosure entity
	 *
	 * @param string $disclose_fields The fields to disclose in whois responses
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( string $disclose_fields ) {
		if ( ! in_array( $disclose_fields, self::VALID_DISCLOSURE_SETTINGS, true ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid disclosure fields selected.' );
		}

		$this->disclose_fields = $disclose_fields;
	}

	/**
	 * Get the disclosed fields as a comma delimited list.
	 *
	 * @return string
	 */
	public function get_disclose_fields(): string {
		return $this->disclose_fields;
	}

	/**
	 * Get the disclosed fields as a comma delimited list.
	 *
	 * @internal
	 *
	 * @return string
	 */
	public function __toString(): string {
		return $this->get_disclose_fields();
	}
}
