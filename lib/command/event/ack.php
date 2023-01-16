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
 * Acknowledge an event
 *
 *  - The command requests acknowledging a specific event by using the event ID.
 *  - IDs can be fetched using the `Event\Enumerate` command.
 *  - This command executes synchronously on the server.
 *
 * @see \Automattic\Domain_Services\Response\Event\Ack
 * @see \Automattic\Domain_Services\Response\Event\Enumerate
 */
class Ack implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * ID of the event to be acknowledged.
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
	 * Gets the event ID
	 *
	 * @return int
	 */
	public function get_event_id(): int {
		return $this->event_id;
	}

	/**
	 * @internal
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_EVENT_ID => $this->get_event_id(),
		];
	}
}
