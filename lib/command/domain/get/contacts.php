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

namespace Automattic\Domain_Services_Client\Command\Domain\Get;

use Automattic\Domain_Services_Client\{Command, Entity};

/**
 * Retrieves contact information for a domain that is registered with the reseller.
 *
 * - This command retrieves all the contact information (owner, tech, billing and admin) for a domain 
 *   that is registered on the reseller's account.
 * - If the domain is not registered on the reseller's account an error is returned.
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Get\Contacts
 */
class Contacts implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * @var Entity\Domain_Name domain which information will be retrieved
	 */
	private Entity\Domain_Name $domain;

	/**
	 * Constructs a `Domain\Get\Contacts` command
	 *
	 * @param Entity\Domain_Name $domain
	 */
	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	/**
	 * Gets the domain name
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
