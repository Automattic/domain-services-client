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

namespace Automattic\Domain_Services\Event\Domain\Notification;

use Automattic\Domain_Services\{Entity, Event};

class Auction implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * This should be one of PARKED, SUBMITTED, ACTIVE
	 *
	 * @return string|null
	 */
	public function get_auction_status(): ?string {
		return $this->get_data_by_key( 'event_data.auction_status' );
	}

	/**
	 * This is the date at which the domain will exit the current auction state
	 *
	 * @return \DateTimeImmutable|null
	 */
	public function get_auction_status_end_date(): ?\DateTimeImmutable {
		$auction_state_end_date = $this->get_data_by_key( 'event_data.auction_status_end_date' );

		if ( null === $auction_state_end_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $auction_state_end_date );
	}
}
