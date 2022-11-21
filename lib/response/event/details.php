<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Event;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response of an Event_Details command.
 */
class Details implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_event(): ?Entity\Reseller_Event {
		$event_data = $this->get_data_by_key( 'data.event' );

		return Entity\Reseller_Event::from_array( $event_data );
	}
}
