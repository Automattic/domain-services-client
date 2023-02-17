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

namespace Automattic\Domain_Services_Client\Event\Domain\Set\Contacts;

use Automattic\Domain_Services_Client\{Command, Entity, Event, Exception};

/**
 * Event representing a `Domain\Set\Contacts` command success
 *
 * @see Command\Domain\Set\Contacts
 */
class Success implements Event\Event_Interface, Event\Async_Command_Related_Interface {
	use Event\Async_Command_Related_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * Returns the domain contacts of the updated domain
	 *
	 * @return Entity\Domain_Contacts
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'event_data.contacts' ) ?? [];

		return Entity\Domain_Contacts::from_array( $contact_data );
	}
}
