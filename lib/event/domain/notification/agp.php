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
 * Domain entered the Add Grace Period (AGP) event
 *
 * - This event is generated when a domain enters the Add Grace Period (AGP)
 * - The AGP is a period (usually of 5 days) starting with the domain's registration when it can be deleted and its
 *   registration cost will be credited back to the registrar
 * - The idea of the AGP is to allow domains registered by mistake or with typos to be canceled with little to no
 *   penalty for the registrant or registrars
 * - Excessive cancellations in AGP may incur a penalty
 * - This event may contain an `agp_end_date` property which can be retrieved using the `get_agp_end_date` method
 *     - That is the date until which the domain is in AGP
 */
class Agp implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	/**
	 * Returns the date until which a domain is in AGP, if available
	 *
	 * @return \DateTimeImmutable|null
	 */
	public function get_agp_end_date(): ?\DateTimeImmutable {
		$agp_end_date = $this->get_data_by_key( 'event_data.agp_end_date' );

		if ( null === $agp_end_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $agp_end_date );
	}
}
