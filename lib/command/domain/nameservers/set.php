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

namespace Automattic\Domain_Services\Command\Domain\Nameservers;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Sets name servers for the specified domain
 *
 * - Runs asynchronously on the server
 * - Reseller will receive a `Domain\Nameservers\Set\Success` or `Domain\Nameservers\Set\Fail` event depending on the
 *   result of the operation
 *
 * @see \Automattic\Domain_Services\Response\Domain\Nameservers\Set
 * @see \Automattic\Domain_Services\Event\Domain\Nameservers\Set\Success
 * @see \Automattic\Domain_Services\Event\Domain\Nameservers\Set\Fail
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Nameservers_Trait;

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
		return 'Domain_Nameservers_Set';
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_nameservers_array_key() => $this->get_nameservers()->to_array(),
		];
	}
}
