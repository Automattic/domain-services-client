<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Command, Entity, Mock, Response};

class Events_Get_Test extends Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$command = new Command\Events\Get();

		$response_data = get_mock_response( $command, null, 'success' );

		/** @var Response\Events\Get $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertIsValidResponse( $response_data, $response_object );

		$this->assertInstanceOf( Response\Events\Get::class, $response_object );

		$events = $response_object->get_events();
		$request_params = $response_object->get_request_params();
		$total_count = $response_object->get_total_count();

		foreach ( $events as $index => $event ) {
			$this->assertEquals( $response_data['data']['events'][ $index ]['event_data'], json_encode( $event->get_event_data(), JSON_THROW_ON_ERROR ) );
			$this->assertEquals( $response_data['data']['events'][ $index ]['object_type'], $event->get_object_type() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['object_id'], $event->get_object_id() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['event_subclass'], $event->get_event_subclass() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['event_class'], $event->get_event_class() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['created_date'], $event->get_created_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
			$acknowledge_date = $event->get_acknowledged_date();
			$acknowledge_date = null === $acknowledge_date ? null : $acknowledge_date->format( Entity\Entity_Interface::DATE_FORMAT );
			$this->assertEquals( $response_data['data']['events'][ $index ]['acknowledged_date'], $acknowledge_date );
		}

		$this->assertEquals( $response_data['data']['total_count'], $total_count );
		$this->assertSame( $response_data['data']['request_params'], $request_params );
	}
}
