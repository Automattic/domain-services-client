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

namespace Automattic\Domain_Services\Command\Domain\Set;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Sets name servers for the specified domain
 *
 * - Runs asynchronously on the server
 * - Reseller will receive a `Domain\Set\Nameservers\Success` or `Domain\Set\Nameservers\Fail` event depending on the
 *   result of the operation
 *
 * Example usage:
 *
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $nameservers_array = [
 *     new Entity\Domain_Name( 'ns1.wordpress.com' ),
 *     new Entity\Domain_Name( 'ns2.wordpress.com' ),
 * ];
 * $nameservers = new Entity\Nameservers( $nameservers_array );
 * $command = new Command\Domain\Set\Nameservers( $domain_name, $nameservers );
 *
 * $response = $api->post( $command );
 *
 * if ( $response->is_success() ) {
 *     // command was issued successfully, the client should wait for a `Domain\Set\Nameservers\Success` or
 *     `Domain\Set\Nameservers\Fail event`
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Response\Domain\Set\Nameservers
 * @see \Automattic\Domain_Services\Event\Domain\Set\Nameservers\Success
 * @see \Automattic\Domain_Services\Event\Domain\Set\Nameservers\Fail
 */
class Nameservers implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Domain_Name $domain
	 */
	private Entity\Domain_Name $domain;

	/**
	 * List of nameservers that will be set for the domain.
	 *
	 * @var Entity\Nameservers $nameservers
	 */
	private Entity\Nameservers $nameservers;

	/**
	 * @param Entity\Domain_Name $domain
	 * @param Entity\Nameservers $nameservers
	 */
	public function __construct( Entity\Domain_Name $domain, Entity\Nameservers $nameservers ) {
		$this->domain = $domain;
		$this->nameservers = $nameservers;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Entity\Nameservers
	 */
	public function get_nameservers(): Entity\Nameservers {
		return $this->nameservers;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Domain_Set_Nameservers';
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_DOMAIN => $this->get_domain()->get_name(),
			Command\Command_Interface::KEY_NAMESERVERS => $this->get_nameservers()->to_array(),
		];
	}
}
