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

namespace Automattic\Domain_Services\Command\Dns\Records;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Updates DNS records of a domain
 *
 * - This command sets the DNS records associated with a domain
 * - Any existing records are replaced by the new records
 * - Runs synchronously on the server
 *
 * @see \Automattic\Domain_Services\Response\Dns\Records\Set
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Dns_Records_Trait;

	/**
	 * @var Entity\Dns_Records
	 */
	private Entity\Dns_Records $records;

	/**
	 * @param Entity\Dns_Records $records
	 */
	public function __construct( Entity\Dns_Records $records ) {
		$this->records = $records;
	}

	/**
	 * @return Entity\Dns_Records
	 */
	public function get_records(): Entity\Dns_Records {
		return $this->records;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Dns_Records_Set';
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::get_dns_records_array_key() => $this->get_records()->to_array(),
		];
	}
}
