<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Restore;

use Automattic\Domain_Services\{Entity, Event};

class Success implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	public function get_domain_status(): ?string {
		return $this->get_data_by_key( 'event_data.domain_status' );
	}

	public function get_expiration_date(): ?\DateTimeInterface {
		$expiration_date = $this->get_data_by_key( 'event_data.expiration_date' );
		return null === $expiration_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $expiration_date );
	}

	public function get_renewal_date(): ?\DateTimeInterface {
		$renewal_date = $this->get_data_by_key( 'event_data.renewal_date' );
		return null === $renewal_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $renewal_date );
	}
}
