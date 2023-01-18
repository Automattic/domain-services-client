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
 * Define a valid privacy setting to be used for a domain
 */
class Whois_Privacy {
	/**
	 * Contact information is publicly visible in whois query results
	 */
	public const DISCLOSE_CONTACT_INFO = 'disclose_contact_info';
	/**
	 * Contact information is redacted in whois query results (for each field a generic "REDACTED FOR PRIVACY" is
	 * displayed)
	 */
	public const REDACT_CONTACT_INFO = 'redact_contact_info';
	/**
	 * Third party (privacy service provider) contact information is displayed in whois query results.
	 */
	public const ENABLE_PRIVACY_SERVICE = 'enable_privacy_service';

	private const VALID_PRIVACY_SETTINGS = [
		self::DISCLOSE_CONTACT_INFO,
		self::REDACT_CONTACT_INFO,
		self::ENABLE_PRIVACY_SERVICE,
	];

	/**
	 * The whois privacy setting for a domain
	 *
	 * @var string
	 */
	private string $setting;

	/**
	 * Constructs a `Whois_Privacy` entity
	 *
	 * @param string $setting
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( string $setting ) {
		if ( ! in_array( $setting, self::VALID_PRIVACY_SETTINGS ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid whois privacy setting' );
		}

		$this->setting = $setting;
	}

	/**
	 * Return the whois privacy setting
	 *
	 * @return string
	 */
	public function get_setting(): string {
		return $this->setting;
	}

	/**
	 * Convert the object to scalar
	 *
	 * @internal
	 *
	 * @return string
	 */
	public function to_scalar(): string {
		return $this->get_setting();
	}
}
