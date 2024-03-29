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

namespace Automattic\Domain_Services_Client\Command\Event;

use Automattic\Domain_Services_Client\{Command};

/**
 * Requests a list of unacknowledged events
 *
 * This command is used to request a list of the unacknowledged events. On success, the response object will include an
 * array of events in ascending order by age (oldest to newest). The maximum number of events returned in the response,
 * can be set using the `$limit` property for this command. The limit defaults to 50 if none is set.
 * - This command executes synchronously on the server.
 * - The corresponding response object will include the list of events and the total number of unacknowledged events
 *   for the reseller.
 *
 * @see \Automattic\Domain_Services_Client\Response\Event\Enumerate
 */
class Enumerate implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * Max count of returned events
	 *
	 * @var int
	 */
	private int $limit;

	/**
	 * Constructs an `Event\Enumerate` command
	 *
	 * @param int|null $limit Max count of returned events.
	 */
	public function __construct( int $limit = 50 ) {
		$this->set_limit( $limit );
	}

	/**
	 * Gets the maximum number of events to return in the response.
	 *
	 * @return int
	 */
	private function get_limit(): int {
		return $this->limit;
	}

	/**
	 * Sets the maximum number of events to return in the response.
	 * @param int $limit
	 * @return Enumerate
	 */
	public function set_limit( int $limit ): self {
		$this->limit = $limit;

		return $this;
	}

	/**
	 * Converts the command to an associative array
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_LIMIT => $this->get_limit(),
		];
	}
}
