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

use Automattic\Domain_Services\{Entity, Event};

class Success implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	public function get_domain_status(): ?string {
		return $this->get_data_by_key( 'event_data.domain_status' );
	}

	public function get_created_date(): ?\DateTimeInterface {
		$created_date = $this->get_data_by_key( 'event_data.created_date' );
		return null === $created_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $created_date );
	}

	public function get_expiration_date(): ?\DateTimeInterface {
		$expiration_date = $this->get_data_by_key( 'event_data.expiration_date' );
		return null === $expiration_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $expiration_date );
	}

	public function get_renewal_date(): ?\DateTimeInterface {
		$renewal_date = $this->get_data_by_key( 'event_data.renewal_date' );
		return null === $renewal_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $renewal_date );
	}

	public function get_unverified_contact_suspension_date(): ?\DateTimeInterface {
		$unverified_contact_suspension_date = $this->get_data_by_key( 'event_data.unverified_contact_suspension_date' );
		return null === $unverified_contact_suspension_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $unverified_contact_suspension_date );
	}

	public function get_contacts(): ?Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'event_data.contacts' ) ?? [];
		return null === $contact_data ? null : Entity\Domain_Contacts::from_array( $contact_data );
	}
}
