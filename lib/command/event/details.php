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

namespace Automattic\Domain_Services\Command\Event;

use Automattic\Domain_Services\{Command};

/**
 * Retrieves details of an event.
 */
class Details implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Event_Trait;

	/**
	 * ID of the event whose details will be checked.
	 *
	 * @var int
	 */
	private int $event_id;

	/**
	 * @param int $event_id
	 */
	public function __construct( int $event_id ) {
		$this->event_id = $event_id;
	}

	/**
	 * @return int
	 */
	public function get_event_id(): int {
		return $this->event_id;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Event_Details';
	}

	public function to_array(): array {
		return [
			self::get_event_id_array_key() => $this->get_event_id(),
		];
	}
}
