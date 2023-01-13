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
 * Requests details of an event
 *
 *  - This command requests the details of a specific event using its ID.
 *  - IDs can be fetched using the `Event\Enumerate` command.
 *  - This command executes synchronously on the server.
 *  - The corresponding response object will include the details of an event.
 *
 * @see \Automattic\Domain_Services\Response\Event\Details
 * @see \Automattic\Domain_Services\Response\Event\Enumerate
 */
class Details implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Array_Key_Event_Trait;

	/**
	 * ID of the event whose details will be checked.
	 *
	 * @var int
	 */
	private int $event_id;

	/**
	 * Event_Details command constructor
	 *
	 * @param int $event_id
	 */
	public function __construct( int $event_id ) {
		$this->event_id = $event_id;
	}

	/**
	 * Gets the event ID
	 *
	 * @return int
	 */
	public function get_event_id(): int {
		return $this->event_id;
	}

	/**
	 * {@inheritDoc}
	 */
	public function to_array(): array {
		return [
			self::get_event_id_array_key() => $this->get_event_id(),
		];
	}
}
