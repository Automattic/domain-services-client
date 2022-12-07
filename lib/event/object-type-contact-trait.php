<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\{Entity};

trait Object_Type_Contact_Trait {
	final public function get_contact_id(): Entity\Contact_Id {
		return new Entity\Contact_Id( $this->get_object_id() );
	}
}
