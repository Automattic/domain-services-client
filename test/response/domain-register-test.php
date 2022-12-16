<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

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
			'data' => [],
		];

		/** @var Response\Domain\Register $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Register::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );
	}
}
