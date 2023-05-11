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
 * Trait that adds the `get_transferlocked_until_date` method to an event
 */
trait TransferLocked_Trait {
	/**
	 * Gets the date until when the domain is transfer locked
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_transferlocked_until_date(): ?\DateTimeInterface {
		$transferlocked_until_date = $this->get_data_by_key( 'event_data.transferlocked_until_date' );

		return null === $transferlocked_until_date ? null : Helper\Date_Time::createImmutable( $transferlocked_until_date );
	}
}
