<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Register_Test extends Test\Lib\Domain_Services_Client_Test_Case {
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
			'fax' => null,
		];

		$contacts = Entity\Domain_Contacts::from_array(
			[
				'owner' => [ 'contact_information' => $contact_info ],
				'admin' => [ 'contact_information' => $contact_info ],
			]
		);

		$name_servers = new Entity\Nameservers(
			new Entity\Domain_Name( 'ns1.example.com' ),
			new Entity\Domain_Name( 'ns2.example.com' ),
		);

		$dns_records = new Entity\Dns_Records(
			$domain,
			new Entity\Dns_Record_Sets(
				new Entity\Dns_Record_Set(
					'@',
					new Entity\Dns_Record_Type( Entity\Dns_Record_Type::A ),
					3600,
					[
						'1.2.3.4',
						'5.6.7.8',
					]
				)
			)
		);

		$command = new Command\Domain\Register( $domain, $contacts, 1, $name_servers, $dns_records, Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE, null );

		$mock_response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '990c3ae1-3210-49f2-9ce6-51a14bc2a2c6.local-isolated-test-request',
			'timestamp' => 1669075523,
			'runtime' => 0.0029,
			'data' => [
				'domain_status' => 'ACTIVE',
				'created_date' => '2022-06-24 15:18:08',
				'expiration_date' => '2023-06-24 15:18:08',
				'renewal_date' => '2023-07-29 15:18:08',
				'unverified_contact_suspension_date' => '2022-07-09 15:18:08',
				'contacts' => [
					'owner' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => $contact_info,
						'contact_disclosure' => 'none',
					],
					'admin' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => $contact_info,
						'contact_disclosure' => 'none',
					],
					'tech' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => $contact_info,
						'contact_disclosure' => 'none',
					],
					'billing' => [
						'contact_id' => 'SP1:P-ABC1234',
						'contact_information' => $contact_info,
						'contact_disclosure' => 'none',
					],
				],
			],
		];

		/** @var Response\Domain\Register $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Register::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );

		$response_contacts = $response_object->get_contacts();
		foreach ( $response_contacts as $contact_type => $response_contact ) {
			$contact_id = (string) $response_contact->get_contact_id();
			$contact_info = $response_contact->get_contact_information()->to_array();
			$contact_disclosure = $response_contact->get_contact_disclosure()->get_disclose_fields();

			$this->assertSame( $mock_response_data['data']['contacts'][ $contact_type ]['contact_id'], $contact_id );
			$this->assertSame( $mock_response_data['data']['contacts'][ $contact_type ]['contact_information'], $contact_info );
			$this->assertSame( $mock_response_data['data']['contacts'][ $contact_type ]['contact_disclosure'], $contact_disclosure );
		}

		$this->assertSame( $mock_response_data['data']['contacts'], $response_object->get_contacts()->to_array() );

		$this->assertSame( $mock_response_data['data']['domain_status'], $response_object->get_domain_status() );
		$this->assertSame( $mock_response_data['data']['created_date'], $response_object->get_created_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
		$this->assertSame( $mock_response_data['data']['expiration_date'], $response_object->get_expiration_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
		$this->assertSame( $mock_response_data['data']['renewal_date'], $response_object->get_renewal_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
		$this->assertSame( $mock_response_data['data']['unverified_contact_suspension_date'], $response_object->get_unverified_contact_suspension_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
	}
}
