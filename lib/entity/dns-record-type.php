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
 * Represents a DNS Record Type
 */
class Dns_Record_Type {
	public const A = 'A';
	public const AAAA = 'AAAA';
	public const ALIAS = 'ALIAS';
	public const CAA = 'CAA';
	public const CNAME = 'CNAME';
	public const MX = 'MX';
	public const NS = 'NS';
	public const PTR = 'PTR';
	public const TXT = 'TXT';
	public const SOA = 'SOA';
	public const SRV = 'SRV';

	public const VALID_RECORD_TYPES = [
		self::A,
		self::AAAA,
		self::ALIAS,
		self::CAA,
		self::CNAME,
		self::MX,
		self::NS,
		self::PTR,
		self::TXT,
		self::SOA,
		self::SRV,
	];

	/**
	 * The DNS record type.
	 *
	 * @var string
	 */
	private string $type;

	/**
	 * Constructs a `Dns_Record_Type` entity
	 *
	 * @param string $type
	 *
	 * @throws \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( string $type ) {
		if ( ! in_array( $type, self::VALID_RECORD_TYPES ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__ );
		}

		$this->type = $type;
	}

	/**
	 * Returns the DNS record type
	 *
	 * @return string
	 */
	public function get_type(): string {
		return $this->type;
	}

	/**
	 * Returns the DNS record type as a string
	 *
	 * @internal
	 */
	public function __toString() {
		return $this->get_type();
	}
}
