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

namespace Automattic\Domain_Services\Response\Events;

use Automattic\Domain_Services\{Event, Exception, Response};

/**
 * Response of Events\Get command
 *
 * This class encapsulates the data for a successful call to the Events\Get command. It includes a list of Event
 * objects which all implement the methods in Event\Data_Trait. Each individual event class may also implement
 * additional methods depending on the specific event_class and event_subclass properties of the event.
 *
 * @see Event\Data_Trait
 */
class Get implements Response\Response_Interface {
	use Response\Data_Trait, Response\Event_Aware;

	private const TOTAL_COUNT = 'data.total_count';
	private const EVENTS = 'data.events';
	private const REQUEST_PARAMS = 'data.request_params';

	/**
	 * Gets the total number of events returned
	 *
	 * @return int
	 */
	public function get_total_count(): int {
		return $this->get_data_by_key( self::TOTAL_COUNT );
	}

	/**
	 * Gets the list of events returned, converted to Event objects
	 *
	 * @return Event\Event_Interface[]
	 * @throws Exception\Event\Invalid_Event_Name
	 */
	public function get_events(): array {
		$events_data = $this->get_data_by_key( self::EVENTS );

		$events = [];
		foreach ( $events_data as $event_data ) {
			$events[] = $this->get_event_factory()->build_event( $event_data );
		}

		return $events;
	}

	/**
	 * Gets the request parameters from the original Command\Events\Get request
	 *
	 * @return array
	 */
	public function get_request_params(): array {
		return $this->get_data_by_key( self::REQUEST_PARAMS );
	}
}
