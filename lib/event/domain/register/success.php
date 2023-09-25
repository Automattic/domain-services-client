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

namespace Automattic\Domain_Services_Client\Event\Domain\Register;

use Automattic\Domain_Services_Client\{Entity, Event, Exception, Helper};
use Automattic\Domain_Services_Client\Response\Event_Aware;

/**
 * Success event for a `Domain\Register` command.
 *
 * This event is sent when a register operation succeeds.
 *
 * @see \Automattic\Domain_Services_Client\Command\Domain\Register
 */
class Success implements Event\Event_Interface, Event\Async_Command_Related_Interface {
	use Event\Async_Command_Related_Trait;
	use Event\Object_Type_Domain_Trait;
	use Event\TransferLocked_Trait;
	use Event\Renewable_Until_Trait;
	use Event\Created_Date_Trait;
	use Event\Expiration_Date_Trait;
	use Event\Unverified_Contact_Suspension_Date_Trait

	/**
	 * Gets the date the domain will exit the Add Grace Period (AGP); null if no AGP is offered
	 *
	 * - If AGP is offered, the reseller may receive a credit for domains deleted during this period (usually 5 days
	 *   after registration)
	 * - Excessive cancellations in AGP may incur a penalty
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_agp_end_date(): ?\DateTimeInterface {
		$agp_end_date = $this->get_data_by_key( 'event_data.agp_end_date' );

		return null === $agp_end_date ? null : Helper\Date_Time::createImmutable( $agp_end_date );
	}

	/**
	 * Gets the list of domain statuses
	 *
	 * @return Entity\Epp_Status_Codes
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_domain_status(): Entity\Epp_Status_Codes {
		$epp_statuses_data = $this->get_data_by_key( 'event_data.domain_status' );
		$epp_statuses = [];
		foreach ( $epp_statuses_data as $epp_status_data ) {
			$epp_statuses[] = new Entity\Epp_Status_Code( $epp_status_data );
		}
		return new Entity\Epp_Status_Codes( ...$epp_statuses );
	}

	/**
	 * Gets the contacts set for the domain
	 *
	 * @return null|Entity\Domain_Contacts
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_contacts(): ?Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'event_data.contacts' ) ?? [];

		return null === $contact_data ? null : Entity\Domain_Contacts::from_array( $contact_data );
	}
}
