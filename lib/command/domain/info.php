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
 * Retrieves information about a domain that is registered with the reseller.
 *
 * - This command retrieves information about a domain that is registered on the reseller's account.
 * - If the domain is not registered on the reseller's account an error is returned.
 *
 * @see \Automattic\Domain_Services\Response\Domain\Info
 */
class Info implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Domain_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * @var Entity\Domain_Name domain which information will be retrieved
	 */
	private Entity\Domain_Name $domain;

	/**
	 * `Domain\Info` command constructor
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
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function get_name(): string {
		return 'Domain_Info';
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
