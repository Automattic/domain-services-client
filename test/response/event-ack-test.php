<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Command, Mock, Response};

class Event_Ack_Test extends Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$command = new Command\Event\Ack( 1234 );

		$response_data = get_mock_response( $command, null, 'success' );

		/** @var Response\Dns\Records\Get $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Event\Ack::class, $response_object );
		$this->assertIsValidResponse( $response_data, $response_object );
	}
}
