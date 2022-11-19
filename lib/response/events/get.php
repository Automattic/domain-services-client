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
	 * @return Entity\Event[]
	 */
	public function get_events(): array {
		$events_data = $this->get_data_by_key( self::EVENTS );

		$events = [];
		foreach ( $events_data as $event_data ) {
			$events[] = Entity\Event::from_array( $event_data );
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

//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => '0b91ec36-5539-428f-bf49-1f9f906d2f74.local-isolated-test-request',
//  'timestamp' => 1667860821,
//  'runtime' => 0.0008,
//  'total_count' => 2,
//  'events' =>
//  array (
//	  2 =>
//		  array (
//			  'id' => 2,
//			  'event_class' => 'main-event-class-A',
//			  'event_subclass' => '',
//			  'event_data' => '{"test-data":22222}',
//			  'object_type' => '',
//			  'object_id' => '',
//			  'created_date' => '2022-02-01 00:00:00',
//			  'acknowledged_date' => NULL,
//		  ),
//	  3 =>
//		  array (
//			  'id' => 3,
//			  'event_class' => 'main-event-class-B',
//			  'event_subclass' => '',
//			  'event_data' => '{"test-data":33333}',
//			  'object_type' => '',
//			  'object_id' => '',
//			  'created_date' => '2022-03-01 00:00:00',
//			  'acknowledged_date' => NULL,
//		  ),
//  ),
//  'request_params' =>
//  array (
//	  'filter' => NULL,
//	  'first' => 0,
//	  'limit' => 50,
//	  'date_start' => NULL,
//	  'date_end' => NULL,
//	  'show_acknowledged' => false,
//  ),
