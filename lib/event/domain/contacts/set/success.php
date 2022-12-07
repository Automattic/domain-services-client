<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Contacts\Set;

use Automattic\Domain_Services\{Entity, Event};

class Success implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'event_data.contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}
}
