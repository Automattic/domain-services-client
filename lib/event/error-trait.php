<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\{Entity};

trait Error_Trait {
	final public function get_error_reason(): string {
		return $this->get_data_by_key( 'event_data.error.data.reason' );
	}
}
