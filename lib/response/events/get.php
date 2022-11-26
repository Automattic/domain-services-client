<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Events;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response of Events_Get command.
 */
class Get implements Response\Response_Interface {
	use Response\Data_Trait;

	private const TOTAL_COUNT = 'data.total_count';
	private const EVENTS = 'data.events';
	private const REQUEST_PARAMS = 'data.request_params';

	/**
	 * @return int
	 */
	public function get_total_count(): int {
		return $this->get_data_by_key( self::TOTAL_COUNT );
	}

	/**
	 * @return Entity\Reseller_Event[]
	 * @throws \JsonException
	 */
	public function get_events(): array {
		$events_data = $this->get_data_by_key( self::EVENTS );

		$events = [];
		foreach ( $events_data as $event_data ) {
			$events[] = Entity\Reseller_Event::from_array( $event_data );
		}

		return $events;
	}

	/**
	 * @return array
	 */
	public function get_request_params(): array {
		return $this->get_data_by_key( self::REQUEST_PARAMS );
	}
}
