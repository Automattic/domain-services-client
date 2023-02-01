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

use Automattic\Domain_Services_Client\{Command, Exception};

/**
 * Set of DNS records associated with a specific domain
 *
 * @see Domain_Name
 * @see Dns_Record_Sets
 */
class Dns_Records {
	/**
	 * The domain name that the DNS records apply to.
	 *
	 * @var Domain_Name
	 */
	private Domain_Name $domain;

	/**
	 * The list of DNS records for this domain.
	 *
	 * @var Dns_Record_Sets
	 */
	private Dns_Record_Sets $record_sets;

	/**
	 * Constructs a Dns_Records entity
	 *
	 * @param Domain_Name     $domain
	 * @param Dns_Record_Sets $record_sets
	 */
	public function __construct( Domain_Name $domain, Dns_Record_Sets $record_sets ) {
		$this->domain = $domain;
		$this->record_sets = $record_sets;
	}

	/**
	 * Returns the domain name associated with the DNS records
	 *
	 * @return Domain_Name
	 */
	public function get_domain(): Domain_Name {
		return $this->domain;
	}

	/**
	 * Returns the sets of DNS records associated with a domain
	 *
	 * @return Dns_Record_Sets
	 */
	public function get_record_sets(): Dns_Record_Sets {
		return $this->record_sets;
	}

	/**
	 * Returns an array containing sets of DNS records associated with a domain
	 *
	 * @internal
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_DOMAIN => $this->domain->get_name(),
			Command\Command_Interface::KEY_RECORD_SETS => $this->record_sets->to_array(),
		];
	}

	/**
	 * Constructs a Dns_Records entity from an array containing sets of DNS records
	 *
	 * @param array $dns_records_data
	 * @return static
	 * @throws Exception\Entity\Invalid_Value_Exception
	 *
	 * @internal
	 * @see \Automattic\Domain_Services_Client\Entity\Dns_Record_Sets
	 */
	public static function from_array( array $dns_records_data ): self {
		$domain_name = new Domain_Name( $dns_records_data[ Command\Command_Interface::KEY_DOMAIN ] );
		$dns_record_sets = Dns_Record_Sets::from_array( $dns_records_data[ Command\Command_Interface::KEY_RECORD_SETS ] );

		return new self( $domain_name, $dns_record_sets );
	}
}
