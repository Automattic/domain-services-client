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

/**
 * Domain entered redemption period event
 *
 * - This event is generated when a domain enters the redemption period
 * - A domain enters redemption when the Auto-Renew Grace Period (ARGP) ends and the domain wasn't renewed
 * - A domain in redemption can still be restored, but a redemption fee (which is costlier than a renewal fee) will be
 *   charged
 * - If the redemption period ends, the domain goes into `pending_delete` status at the registry for 5 days and, after
 *   that, it's usually released and may become available for registration again
 * - This event contains a `redemption_end_date` property which can be retrieved using the `get_redemption_end_date`
 *   method
 *     - That is the date until which the domain is in redemption
 *
 * @see \Automattic\Domain_Services\Event\Domain\Notification\Argp
 */
class Redemption implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	/**
	 * Returns the date until which a domain is in redemption, if available
	 *
	 * @return \DateTimeImmutable|null
	 */
	public function get_redemption_end_date(): ?\DateTimeImmutable {
		$redemption_end_date = $this->get_data_by_key( 'event_data.redemption_end_date' );

		if ( null === $redemption_end_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $redemption_end_date );
	}
}
