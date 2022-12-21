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
 * Domain entered the Auto-Renew Grace Period (ARGP) event
 *
 * - This event is generated when a domain enters the Auto-Renew Grace Period (ARGP)
 * - A domain enters the ARGP when it expires without being renewed. The ARGP is a period (usually of 45 days) after the
 *   domain's expiration when it is automatically renewed for a year at the registry (the registrar is also charged for
 *   that renewal)
 * - The registrant may renew the domain for the regular renewal price during ARGP
 * - If the registrant deletes the domain during ARGP, the renewal is canceled at the registry and the renewal cost is
 *   refunded to the registrar
 * - If the ARGP ends and no action was taken, the domain enters the Redemption Grace Period (RGP)
 * - This event contains an `argp_end_date` property which is a timestamp in `Y-m-d H:i:s` format representing the date
 *   until which the domain is in ARGP
 */
class Argp implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	public function get_argp_end_date(): ?\DateTimeImmutable {
		$argp_end_date = $this->get_data_by_key( 'event_data.argp_end_date' );

		if ( null === $argp_end_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $argp_end_date );
	}
}
