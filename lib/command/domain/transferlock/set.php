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

namespace Automattic\Domain_Services\Command\Domain\Transferlock;

use Automattic\Domain_Services\{Command, Entity};

class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Transferlock_Trait;

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

	public function __construct( Entity\Domain_Name $domain, bool $transfer_lock ) {
		$this->domain = $domain;
		$this->transfer_lock = $transfer_lock;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return bool
	 */
	public function get_transfer_lock(): bool {
		return $this->transfer_lock;
	}

	public static function get_name(): string {
		return 'Domain_Transferlock_Set';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_transferlock_array_key() => $this->get_transfer_lock(),
		];
	}
}
