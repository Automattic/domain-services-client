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
 * Set of name servers
 */
class Nameservers {
	/**
	 * A list of name servers for a domain name.
	 * All names in the list must be unique.
	 * There must be a minimum of two name servers and a maximum of 12.
	 *
	 * @var Domain_Name[]
	 */
	private array $nameservers = [];

	/**
	 * Constructs the Nameservers entity
	 *
	 * @param Domain_Name ...$nameservers
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( Domain_Name ...$nameservers ) {
		if ( count( $nameservers ) < 2 ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have at least two name servers' );
		}

		if ( count( $nameservers ) > 12 ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have at no more than 12 name servers' );
		}

		foreach ( $nameservers as $nameserver ) {
			$this->add_nameserver( $nameserver );
		}
	}

	/**
	 * Adds a name server to the list of name servers
	 *
	 * @param Domain_Name $nameserver
	 * @return void
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function add_nameserver( Domain_Name $nameserver ): void {
		if ( 12 === count( $this->nameservers ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have at no more than 12 name servers' );
		}

		if ( isset( $this->nameservers[ $nameserver->get_name() ] ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have unique name server names' );
		}

		$this->nameservers[ $nameserver->get_name() ] = $nameserver;
	}

	/**
	 * Returns the list os name servers as an array of strings
	 *
	 * @internal
	 * @return array
	 */
	public function to_array(): array {
		$nameserver_names = [];
		foreach ( $this->nameservers as $domain_name ) {
			$nameserver_names[] = $domain_name->get_name();
		}

		return $nameserver_names;
	}
}
