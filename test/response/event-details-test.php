<?php

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Mock, Response, Test};

class Event_Details_Test extends Test\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$command = new Command\Event\Details( 1234 );

		$response_data = Test\get_mock_response( $command, null, 'success' );

		/** @var Response\Event\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		// TODO: Add in assertIsValidResponse once this method is merged from PR #5

		$reseller_event = $response_object->get_event();
		$this->assertNotNull( $reseller_event );

		$expected_response_data = $response_data['data']['event'];
		$json_encoded_reseller_event_data = json_encode( $reseller_event->get_event_data(), JSON_THROW_ON_ERROR );

		$this->assertEquals( $expected_response_data['created_date'], $reseller_event->get_created_date()->format( 'Y-m-d H:i:s' ) );
		$this->assertEquals( $expected_response_data['acknowledged_date'], $reseller_event->get_acknowledged_date()->format( 'Y-m-d H:i:s' ) );
		$this->assertEquals( $expected_response_data['event_class'], $reseller_event->get_event_class() );
		$this->assertEquals( $expected_response_data['event_data'], $json_encoded_reseller_event_data );
		$this->assertEquals( $expected_response_data['event_subclass'], $reseller_event->get_event_subclass() );
		$this->assertEquals( $expected_response_data['id'], $reseller_event->get_id() );
		$this->assertEquals( $expected_response_data['object_id'], $reseller_event->get_object_id() );
		$this->assertEquals( $expected_response_data['object_type'], $reseller_event->get_object_type() );
	}
}
