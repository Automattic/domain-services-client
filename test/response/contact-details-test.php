<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Command, Entity, Mock, Response};

class Contact_Details_Test extends Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$contact_id = new Entity\Contact_Id( 'SP1:P-ABC2134' );
		$command = new Command\Contact\Details( $contact_id );

		$response_data = get_mock_response( $command, null, 'success' );

		/** @var Response\Contact\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Contact\Details::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$contact_information = $response_object->get_contact_information()->to_array();
		$this->assertSame( $response_data['data']['contact_information'], $contact_information );
	}
}
