<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Event;

use Automattic\Domain_Services\{Command, Event, Response, Test};

class Domain_Contacts_Set_Success_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_event_success(): void {
		$command = new Command\Event\Details( 1234 );

		$contact_info = [
			'first_name' => 'John',
			'last_name' => 'Doe',
			'organization' => '',
			'address_1' => '60 29th Street #343',
			'address_2' => '',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'registrar@automattic.com',
			'phone' => '+1.8772733049',
			'fax' => null,
		];

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '5ffdba44-eeec-4647-9cc4-27cdf8352efc.local-isolated-test-request',
			'timestamp' => 1669075517,
			'runtime' => 0.0019,
			'data' => [
				'event' => [
					'id' => 1234,
					'event_class' => 'Domain_Contacts_Set',
					'event_subclass' => 'Success',
					'object_type' => 'domain',
					'object_id' => 'example.com',
					'event_date' => '2022-01-23 12:34:56',
					'acknowledged_date' => null,
					'event_data' => [
						'contacts' => [
							'owner' => [
								'contact_id' => 'SP1:P-ABC1234',
								'contact_information' => $contact_info,
								'contact_disclosure' => 'none',
							],
							'admin' => [
								'contact_id' => 'SP1:P-XYZ5678',
								'contact_information' => $contact_info,
								'contact_disclosure' => 'none',
							],
						],
					],
				],
			],
		];

		/** @var Response\Event\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertIsValidResponse( $response_data, $response_object );

		$event = $response_object->get_event();
		$this->assertNotNull( $event );

		$this->assertInstanceOf( Event\Domain\Contacts\Set\Success::class, $event );
		$this->assertSame( $response_data['data']['event']['event_data']['contacts'], $event->get_contacts()->to_array() );
		$this->assertSame( $response_data['data']['event']['object_id'], $event->get_domain()->get_name() );
	}
}