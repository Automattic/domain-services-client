<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Event;

use Automattic\Domain_Services\{Event, Exception\Event\Invalid_Event_Name, Response};

/**
 * Response of an Event_Details command.
 */
class Details implements Response\Response_Interface {
	use Response\Data_Trait, Response\Event_Aware;

	/**
	 * @throws Invalid_Event_Name
	 */
	public function get_event(): ?Event\Event_Interface {
		$event_data = $this->get_data_by_key( 'data.event' );

		return $this->get_event_factory()->build_event( $event_data );
	}
}
