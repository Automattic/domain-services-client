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
 * Check if a domain can be transferred in.
 *
 * - This command perform some checks to determine if a domain can be transferred.
 * - The domain must be unlocked and have the correct auth code.
 * - The domain must not be within 60 days of the registration date or a previous transfer.
 * - The domain must not be within 60 days of a previous transfer.
 * - The domain must not be premium.
 * - The tld should be supported.
 *
 * Example usage:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example.com' );
 * $auth_code = '1234567890';
 * $command = new Command\Domain\Transferable( $domain_name, $auth_code );
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *        $transferable = $response->get_data()->is_transferable();
 * }
 * ```
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Transferable
 */
class Transferable implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * The domain to transfer in
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The auth code for the domain.
	 *
	 * @var string
	 */
	private string $auth_code;

	public function __construct( Entity\Domain_Name $domain, string $auth_code ) {
		$this->domain = $domain;
		$this->auth_code = $auth_code;
	}

		/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return string
	 */
	public function get_auth_code(): string {
		return $this->auth_code;
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
			Command\Command_Interface::KEY_AUTH_CODE => $this->get_auth_code(),
		];
	}
}
