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

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Deletes a domain
 *
 * - This command deletes a domain from the reseller's account
 * - After you delete a domain, it may be impossible to register it again
 * - Runs asynchronously on the server
 * - Reseller will receive a `Domain\Delete\Success` or `Domain\Delete\Fail` event depending on the result of the
 *   command
 *
 * Example usage:
 *
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $command = new Command\Domain\Delete( $domain_name );
 *
 * $response = $api->post( $command );
 *
 * if ( $response->is_success() ) {
 *     // command was issued correctly, the client should wait for a `Domain\Delete\Success` or
 *     // `Domain\Delete\Fail` event
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Response\Domain\Delete
 * @see \Automattic\Domain_Services\Event\Domain\Delete\Success
 * @see \Automattic\Domain_Services\Event\Domain\Delete\Fail
 */
class Delete implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * The domain name to delete
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * Constructs the Delete command
	 *
	 * @param Entity\Domain_Name $domain
	 */
	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	/**
	 * Returns the domain name that will be deleted
	 *
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * {@inheritDoc}
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_DOMAIN => $this->get_domain()->get_name(),
		];
	}
}
