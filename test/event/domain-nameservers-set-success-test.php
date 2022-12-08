<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Event;

use Automattic\Domain_Services\{Command, Event, Response, Test};

class Domain_Nameservers_Set_Success_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_event_success(): void {
		$command = new Command\Event\Details( 1234 );

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
					'event_class' => 'Domain_Nameservers_Set',
					'event_subclass' => 'Success',
					'object_type' => 'domain',
					'object_id' => 'example.com',
					'event_date' => '2022-01-23 12:34:56',
					'acknowledged_date' => null,
					'event_data' => [
						'name_servers' => [
							'ns1.wordpress.com',
							'ns2.wordpress.com',
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

		$this->assertInstanceOf( Event\Domain\Nameservers\Set\Success::class, $event );
		$this->assertSame( $response_data['data']['event']['object_id'], $event->get_domain()->get_name() );
		$this->assertSame( $response_data['data']['event']['event_data']['name_servers'], $event->get_nameservers()->to_array() );
	}
}
