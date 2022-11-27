<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Info_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Info( $domain_name );

		$mock_response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '2a32c275-566e-4f2a-ac8b-0e2151d7a8ac.local-isolated-test-request',
			'timestamp' => 1669075519,
			'runtime' => 0.0044,
			'data' => [
				'auth_code' => 'test-auth-code',
				'contacts' => [
					'owner' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => NULL,
						'contact_disclosure' => 'none',
					],
					'admin' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => NULL,
						'contact_disclosure' => 'none',
					],
					'tech' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => NULL,
						'contact_disclosure' => 'none',
					],
					'billing' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => NULL,
						'contact_disclosure' => 'none',
					],
				],
				'created_date' => '2022-06-22 01:23:45',
				'dnssec' => NULL,
				'dnssec_ds_data' => NULL,
				'epp_statuses' => [
					0 => 'clientTransferProhibited',
					1 => 'serverTransferProhibited',
				],
				'name_servers' => [
					0 => 'NS1.WORDPRESS.COM',
					1 => 'NS2.WORDPRESS.COM',
				],
				'paid_until' => '2023-06-24 06:54:32',
				'privacy_setting' => 'enable_privacy_service',
				'registrar_transfer_date' => NULL,
				'renewal_mode' => 'DEFAULT',
				'rgp_status' => 'addPeriod',
				'transfer_lock' => true,
				'transfer_mode' => 'DEFAULT',
				'updated_date' => '2022-06-24 06:54:32',
			],
		];

		/** @var Response\Domain\Info $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Info::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );

		$this->assertEquals( $mock_response_data['data']['contacts'], $response_object->get_contacts()->to_array() );
		$this->assertEquals( $mock_response_data['data']['created_date'], $response_object->get_created_date() );
		$this->assertEquals( $mock_response_data['data']['dnssec'], $response_object->get_dnssec() );
		$this->assertEquals( $mock_response_data['data']['dnssec_ds_data'], $response_object->get_dnssec_ds_dsata() );
		$this->assertEquals( $mock_response_data['data']['epp_statuses'], $response_object->get_epp_statuses()->to_array() );
		$this->assertEquals( $mock_response_data['data']['name_servers'], $response_object->get_name_servers()->to_array() );
		$this->assertEquals( $mock_response_data['data']['paid_until'], $response_object->get_paid_until()->format( Entity\Entity_Interface::DATE_FORMAT ) );
		$this->assertEquals( $mock_response_data['data']['privacy_setting'], $response_object->get_privacy_setting()->get_setting() );
		$this->assertEquals( $mock_response_data['data']['registrar_transfer_date'], $response_object->get_registrar_transfer_date() );
		$this->assertEquals( $mock_response_data['data']['rgp_status'], $response_object->get_rgp_status() );
		$this->assertEquals( $mock_response_data['data']['transfer_lock'], $response_object->get_transfer_lock() );
		$this->assertEquals( $mock_response_data['data']['transfer_mode'], $response_object->get_transfer_mode() );
		$this->assertEquals( $mock_response_data['data']['updated_date'], $response_object->get_updated_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
	}
}
