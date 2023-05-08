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

namespace Automattic\Domain_Services_Client\Event;

use Automattic\Domain_Services_Client\{Exception};

/**
 * Factory class used to build an event from the provided data.
 */
class Factory {
	/**
	 * Builds an event from the provided event data
	 *
	 * @param array $event_data
	 *
	 * @return Event_Interface
	 * @throws Exception\Event\Invalid_Event_Name
	 */
	public function build_event( array $event_data ): Event_Interface {
		$event_class = $event_data['event_class'] ?? null;
		$event_subclass = $event_data['event_subclass'] ?? null;

		if ( null === $event_class || null === $event_subclass ) {
			throw new Exception\Event\Invalid_Event_Name();
		}

		$class_name = __NAMESPACE__ . '\\' . $event_class . '\\' . $event_subclass;
		if ( ! class_exists( $class_name ) ) {
			throw new Exception\Event\Invalid_Event_Name( $event_class, $event_subclass );
		}

		return new $class_name( $event_data );
	}
}
