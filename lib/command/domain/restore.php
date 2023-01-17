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

namespace Automattic\Domain_Services_Client\Command\Domain;

use Automattic\Domain_Services_Client\{Command, Entity};

/**
 * Restores (redeems) a domain that is currently in the redemption period.
 *
 * - This command requests a restore for the specified domain.
 * - May only be used when a domain is in the redemption period. (Usually days 45-75 after expiration for most TLDs)
 * - Restoring a domain will usually also renew the domain for another year from the expiration date.
 * - Restoring a domain usually incurs an additional fee over the regular renewal cost.
 * - Note that not all TLDs support redemption.
 * - The actual restore is processed asynchronously on the server. The result of the actual restore operation will be
 *   returned in an event.
 *
 * Example usage:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example.com' );
 * $command = new Command\Restore( $domain_name );
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *        // The restore request was successfully queued.
 * }
 * ```
 *
 * @see     \Automattic\Domain_Services_Client\Event\Domain\Restore\Fail
 * @see     \Automattic\Domain_Services_Client\Event\Domain\Restore\Success
 * @see     \Automattic\Domain_Services_Client\Response\Domain\Restore
 */
class Restore implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * @var Entity\Domain_Name domain to be restored
	 */
	private Entity\Domain_Name $domain;

	/**
	 * Constructs the Restore command
	 *
	 * @param Entity\Domain_Name $domain
	 */
	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	/**
	 * Gets the domain name to be restored
	 *
	 * @return Entity\Domain_Name
	 */
	private function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * Converts the command to an associative array
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_DOMAIN => $this->get_domain()->get_name(),
		];
	}
}
