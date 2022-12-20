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

use Automattic\Domain_Services\{Command, Entity, Exception};

class Check implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Domains_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * List of domains to check for availability.
	 *
	 * @var Entity\Domain_Names $domains
	 */
	private Entity\Domain_Names $domains;

	public function __construct( Entity\Domain_Names $domains ) {
		if ( 0 === count( $domains->get_domain_names() ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( 'domains', 'At least one domain name must be provided.' );
		}
		$this->domains = $domains;
	}

	/**
	 * @return Entity\Domain_Names
	 */
	public function get_domains(): Entity\Domain_Names {
		return $this->domains;
	}

	public static function get_name(): string {
		return 'Domain_Check';
	}

	public function to_array(): array {
		return [
			self::get_domain_names_array_key() => $this->get_domains()->to_array(),
		];
	}
}
