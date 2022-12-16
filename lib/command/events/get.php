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

namespace Automattic\Domain_Services\Command\Events;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Retrieves a list of unacknowledged events.
 */
class Get implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Event_Trait;

	/**
	 * Max count of returned events
	 *
	 * @var int
	 */
	private int $limit;

	/**
	 * Class constructor
	 *
	 * @param null|int $limit Max count of returned events.
	 */
	public function __construct( int $limit = 50 ) {
		$this->set_limit( $limit );
	}

	/**
	 * @return int
	 */
	public function get_limit(): int {
		return $this->limit;
	}

	/**
	 * @param int $limit
	 * @return Get
	 */
	public function set_limit( int $limit ): self {
		$this->limit = $limit;

		return $this;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Events_Get';
	}

	public function to_array(): array {
		return [
			self::get_event_limit_array_key() => $this->get_limit(),
		];
	}
}
