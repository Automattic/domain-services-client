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

namespace Automattic\Domain_Services_Client\Command\Domain\Set;

use Automattic\Domain_Services_Client\{Command, Entity};

/**
 * Enables/Disables the transfer lock
 *
 * This commands requests either enabling or disabling the transfer lock on a specific domain.
 *
 * Example:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $command = new Command\Domain\Set\Transferlock( $domain, true );
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *   // the request to update transferlock setting has been successfully processed
 * }
 * ```
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Set\Transferlock
 */
class Transferlock implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait;
	use Command\Command_Serialize_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The status of the transfer lock for the given domain.
	 *
	 * @var bool
	 */
	private bool $transfer_lock;

	/**
	 * Constructs a `Domain\Set\Transferlock` command
	 *
	 * @param Entity\Domain_Name $domain
	 * @param bool               $transfer_lock
	 */
	public function __construct( Entity\Domain_Name $domain, bool $transfer_lock ) {
		$this->domain = $domain;
		$this->transfer_lock = $transfer_lock;
	}

	/**
	 * Gets the domain name for that command
	 *
	 * @return Entity\Domain_Name
	 */
	private function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * Gets the transfer lock state to be applied
	 *
	 * @return bool
	 */
	private function get_transfer_lock(): bool {
		return $this->transfer_lock;
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
			Command\Command_Interface::KEY_TRANSFERLOCK => $this->get_transfer_lock(),
		];
	}
}
