<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Register;

use Automattic\Domain_Services\{Entity, Event};

class Success implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

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
