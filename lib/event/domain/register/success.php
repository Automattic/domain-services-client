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

namespace Automattic\Domain_Services\Event\Domain\Register;

use Automattic\Domain_Services\{Entity, Event, Exception};

/**
 * Success event for a `Domain\Register` command.
 *
 * This event is sent when a register operation succeeds.
 *
 * @see \Automattic\Domain_Services\Command\Domain\Register
 */
class Success implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * Gets the list of domain statuses
	 *
	 * @return null|Entity\Epp_Status_Codes
	 */
	public function get_domain_statuses(): Entity\Epp_Status_Codes {
		$epp_statuses_data = $this->get_data_by_key( 'event_data.domain_statuses' );
		$epp_statuses = [];
		foreach ( $epp_statuses_data as $epp_status_data ) {
			$epp_statuses[] = new Entity\Epp_Status_Code( $epp_status_data );
		}
		return new Entity\Epp_Status_Codes( ...$epp_statuses );
	}

	/**
	 * Gets the date the domain was created
	 *
	 * @return null|\DateTimeInterface
	 */
	public function get_created_date(): ?\DateTimeInterface {
		$created_date = $this->get_data_by_key( 'event_data.created_date' );
		return null === $created_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $created_date );
	}

	/**
	 * Gets the domain expiration date
	 *
	 * @return null|\DateTimeInterface
	 */
	public function get_expiration_date(): ?\DateTimeInterface {
		$expiration_date = $this->get_data_by_key( 'event_data.expiration_date' );
		return null === $expiration_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $expiration_date );
	}

	/**
	 * Get the last date to renew the domain
	 *
	 * @return null|\DateTimeInterface
	 */
	public function get_renewable_until(): ?\DateTimeInterface {
		$renewable_until = $this->get_data_by_key( 'event_data.renewable_until' );
		return null === $renewable_until ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $renewable_until );
	}

	/**
	 * Gets the date when the domain will be suspended if the contact information is not verified
	 *
	 * @return null|\DateTimeInterface
	 */
	public function get_unverified_contact_suspension_date(): ?\DateTimeInterface {
		$unverified_contact_suspension_date = $this->get_data_by_key( 'event_data.unverified_contact_suspension_date' );
		return null === $unverified_contact_suspension_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $unverified_contact_suspension_date );
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
