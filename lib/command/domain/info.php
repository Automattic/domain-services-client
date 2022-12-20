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
 * Retrieves information about a domain that is registered with us.
 *
 * Retrieves various information about a domain that is registered with us, such as creation and expiry dates, auth
 * code, name servers and EPP statuses. If the domain is not registered with us, the information of a Domain_Check
 * command is returned instead (domain availability and fees).
 */
class Info implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Domain_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * @var Entity\Domain_Name domain which information will be retrieved
	 */
	private Entity\Domain_Name $domain;

	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	public static function get_name(): string {
		return 'Domain_Info';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
		];
	}
}
