<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain\Contacts;

use Automattic\Domain_Services\{Entity, Response};

class Set implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'data.contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}
}
