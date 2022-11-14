<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Event;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response of an Event_Details command.
 */
class Details implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_event(): ?Entity\Reseller_Event {
		$event_data = $this->get_data_by_key( 'event' );

		return Entity\Reseller_Event::from_array( $event_data );
	}
}

//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => 'c9fc2902-76f5-4c16-ae62-f55e78695660.local-isolated-test-request',
//  'timestamp' => 1667839765,
//  'runtime' => 0.0031,
//  'event' =>
//  array (
//	  'id' => 1234,
//	  'event_class' => 'main-event-class',
//	  'event_subclass' => '',
//	  'event_data' => '{"test-data":12345}',
//	  'object_type' => '',
//	  'object_id' => '',
//	  'created_date' => '2022-08-01 01:23:45',
//	  'acknowledged_date' => NULL,
//  ),
