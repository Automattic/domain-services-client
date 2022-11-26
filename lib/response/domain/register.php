<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\{Entity, Response};

class Register implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_domain_status(): ?string {
		return $this->get_data_by_key( 'data.domain_status' );
	}

	public function get_created_date(): ?string {
		return $this->get_data_by_key( 'data.created_date' );
	}

	public function get_expiration_date(): ?string {
		return $this->get_data_by_key( 'data.expiration_date' );
	}

	public function get_renewal_date(): ?string {
		return $this->get_data_by_key( 'data.renewal_date' );
	}

	public function get_unverified_contact_suspension_date(): ?string {
		return $this->get_data_by_key( 'data.unverified_contact_suspension_date' );
	}

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'data.contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}
}
