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
 * Updates all DNS records associated with a domain.
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Dns_Records_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	private Entity\Dns_Records $records;

	public function __construct( Entity\Dns_Records $records ) {
		$this->records = $records;
	}

	public function get_records(): Entity\Dns_Records {
		return $this->records;
	}

	public static function get_name(): string {
		return 'Dns_Records_Set';
	}

	public function to_array(): array {
		return [
			self::get_dns_records_array_key() => $this->get_records()->to_array(),
		];
	}
}
