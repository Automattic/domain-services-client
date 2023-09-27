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
 * Trait that adds the `get_expiration_date` method to an event
 */
trait Expiration_Date_Trait {
	/**
	 * Gets the domain expiration date
	 *
	 * @return null|\DateTimeInterface
	 */
	public function get_expiration_date(): ?\DateTimeInterface {
		$expiration_date = $this->get_data_by_key( 'event_data.expiration_date' );

		return null === $expiration_date ? null : Helper\Date_Time::createImmutable( $expiration_date );
	}
}
