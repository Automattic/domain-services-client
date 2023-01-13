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

namespace Automattic\Domain_Services\Command\Dns;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Updates DNS records of a domain
 *
 * - This command sets the DNS records associated with a domain
 * - Any existing records are replaced by the new records
 * - Runs synchronously on the server
 *
 * Example usage:
 *
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $records_array = [
 *     [
 *         'name' => 'www',
 *         'type' => 'CNAME',
 *         'ttl' => 3600,
 *         'data' => [ 'example-domain.com.' ]
 *     ],
 *     [
 *         'name' => '@',
 *         'type' => 'A',
 *         'ttl' => 3600,
 *         'data' => [ '1.2.3.4' ]
 *     ],
 * ];
 * $dns_record_sets = Entity\Dns_Record_Sets::from_array( $records_array );
 *
 * $dns_records = new Entity\Dns_Records( $domain_name, $dns_record_sets );
 * $command = new Command\Dns\Set( $dns_records );
 *
 * $response = $api->post( $command );
 *
 * if ( $response->is_success() ) {
 *     $domain_name = $response->get_domain_name();
 *     $records_added = $response->get_records_added();
 *     $records_deleted = $response->get_records_deleted();
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Command\Dns\Get
 * @see \Automattic\Domain_Services\Response\Dns\Set
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Dns_Records_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * DNS records that will be set at the server
	 *
	 * @var Entity\Dns_Records
	 */
	private Entity\Dns_Records $records;

	/**
	 * Constructs a Dns\Set command
	 *
	 * @param Entity\Dns_Records $records
	 */
	public function __construct( Entity\Dns_Records $records ) {
		$this->records = $records;
	}

	/**
	 * Returns the DNS records that will be set at the server
	 *
	 * @return Entity\Dns_Records
	 */
	public function get_records(): Entity\Dns_Records {
		return $this->records;
	}

	/**
	 * {@inheritDoc}
	 */
	public function to_array(): array {
		return [
			self::get_dns_records_array_key() => $this->get_records()->to_array(),
		];
	}
}
