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
 * Domain entered the Add Grace Period (AGP)
 *
 * - This event is generated when a domain enters the Add Grace Period (AGP)
 * - The AGP is a period (usually of 5 days) starting with the domain's registration when it can be deleted and its
 *   registration cost can be refunded by the registry
 * - The idea of the AGP is to allow domains registered by mistake or with typos to be canceled with no penalty for the
 *   registrant or registrars
 * - Note that there's a limit to the number of domains that can be refunded with no cost in AGP: if a registrar cancels
 *   more than 10% of the total number of newly registered domains in a month during AGP, the exceeding canceled domains
 *   are not refunded
 * - This event contains an `agp_end_date` property which is a timestamp in Y-m-d H:i:s format representing the date
 *   until which the domain is in AGP
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
