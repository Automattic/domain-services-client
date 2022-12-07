<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\{Entity};

trait Object_Type_Domain_Trait {
	final public function get_domain(): Entity\Domain_Name {
		return new Entity\Domain_Name( $this->get_object_id() );
	}
}
