<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022-2023 Automattic, Inc.
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

namespace Automattic\Domain_Services_Client\Event\Domain\Notification;

use Automattic\Domain_Services_Client\{Event, Helper};

/**
 * Domain expired event
 *
 * - This event is generated when a has reached the end of its life and is about to be deleted at the registry.
 * - At this point, no further action can be taken on the domain and the domain will be removed from the reseller's
 *        account. Once the pending delete period ends, the domain is usually released for registration again.
 */
class Pending_Delete implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * Returns the date until which a domain is in the Pending_Delete state.
	 *
	 * @return \DateTimeImmutable|null
	 */
	public function get_pending_delete_end_date(): ?\DateTimeImmutable {
		$argp_end_date = $this->get_data_by_key( 'event_data.pending_delete_end_date' );

		if ( null === $argp_end_date ) {
			return null;
		}

		return Helper\Date_Time::createImmutable( $argp_end_date );
	}
}
