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

namespace Automattic\Domain_Services\Response\Event;

use Automattic\Domain_Services\{Event, Exception\Event\Invalid_Event_Name, Response};

/**
 * Response of an Event_Details command.
 *
 * This is the response returned from a successful execution of Event_Details command. The event can be retrieved using get_event() method.
 *
 * @see \Automattic\Domain_Services\Command\Event\Details
 */
class Details implements Response\Response_Interface {
	use Response\Data_Trait, Response\Event_Aware;

	/**
	 * Builds and returns an event entity
	 *
	 * @return Event\Event_Interface
	 * @throws Invalid_Event_Name
	 */
	public function get_event(): Event\Event_Interface {
		$event_data = $this->get_data_by_key( 'data.event' );

		return $this->get_event_factory()->build_event( $event_data );
	}
}
