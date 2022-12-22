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

namespace Automattic\Domain_Services\Command\Dns\Records;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Returns the DNS records of a domain
 *
 * - This command returns all the DNS records associated with a domain
 * - Runs synchronously on the server
 *
 * Example usage:
 *
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $command = new Command\Dns\Get( $domain_name );
 *
 * $response = $api->post( $command );
 *
 * if ( $response->is_success() ) {
 *     // $dns_records is an Entity\Dns_Records instance
 *     $dns_records = $response->get_dns_records();
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Response\Dns\Records\Get
 * @see \Automattic\Domain_Services\Command\Dns\Records\Set
 */
class Get implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * The domain name for which DNS records will be retrieved
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * Constructs a Dns\Records\Get command
	 *
	 * @param Entity\Domain_Name $domain
	 */
	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	/**
	 * Returns the domain name for which DNS records will be retrieved
	 *
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function get_name(): string {
		return 'Dns_Records_Get';
	}

	/**
	 * {@inheritDoc}
	 */
	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
		];
	}
}
