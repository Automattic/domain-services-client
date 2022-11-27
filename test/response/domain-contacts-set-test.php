<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Contacts_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain-name.blog' );
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
			'fax' => '',
		];

		$contacts = Entity\Domain_Contacts::from_array(
			[
				'owner' => [ 'contact_information' => $contact_info ],
				'admin' => [ 'contact_information' => $contact_info ],
			]
		);
		$command = new Command\Domain\Contacts\Set( $domain, $contacts );

		$mock_response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => 'bf091ce4-bca4-4f8e-8d65-30f37d13609d.local-isolated-test-request',
			'timestamp' => 1669075519,
			'runtime' => 0.0104,
			'data' => [
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
		];


		/** @var Response\Domain\Contacts\Set $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Contacts\Set::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );

		$owner_contact = $response_object->get_contacts()->get_owner();
		$owner_contact_id = (string) $owner_contact->get_contact_id();
		$owner_contact_info = $owner_contact->get_contact_information()->to_array();
		$owner_contact_disclosure = $owner_contact->get_contact_disclosure()->get_disclose_fields();

		$this->assertSame( $mock_response_data['data']['contacts']['owner']['contact_id'], $owner_contact_id );
		$this->assertSame( $mock_response_data['data']['contacts']['owner']['contact_information'], $owner_contact_info );
		$this->assertSame( $mock_response_data['data']['contacts']['owner']['contact_disclosure'], $owner_contact_disclosure );

		$this->assertSame( $mock_response_data['data']['contacts'], $response_object->get_contacts()->to_array() );
	}
}
