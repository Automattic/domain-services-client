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

use Automattic\Domain_Services_Client\{Helper};

/**
 * Trait that adds the `get_unverified_contact_suspension_date` method to an event
 */
trait Unverified_Contact_Suspension_Date_Trait {
	/**
	 * Gets the date when the domain will be suspended if the contact information is not verified
	 *
	 * @return null|\DateTimeInterface
	 */
	public function get_unverified_contact_suspension_date(): ?\DateTimeInterface {
		$unverified_contact_suspension_date = $this->get_data_by_key( 'event_data.unverified_contact_suspension_date' );

		return null === $unverified_contact_suspension_date ? null : Helper\Date_Time::createImmutable( $unverified_contact_suspension_date );
	}
}
