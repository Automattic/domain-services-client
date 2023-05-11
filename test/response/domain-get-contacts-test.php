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

namespace Automattic\Domain_Services_Client\Test\Response;

use Automattic\Domain_Services_Client\{Command, Entity, Response, Test};

class Domain_Get_Contacts_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain.com' );
		$command = new Command\Domain\Get\Contacts( $domain );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '5ffdba44-eeec-4647-9cc4-27cdf8352efc.local-isolated-test-request',
			'timestamp' => 1669075517,
			'runtime' => 0.0019,
			'data' => [
				'contacts' => [
					'owner' => [
						'contact_id' => 'SP1:P-ABC123',
						'contact_information' => [
							'first_name' => 'John',
							'last_name' => 'Doe',
							'organization' => '',
							'address_1' => 'Avenida dos Bandeirantes 123',
							'address_2' => 'Apto 12',
							'postal_code' => '12345-678',
							'city' => 'Sao Paulo',
							'state' => '',
							'country_code' => 'BR',
							'email' => 'john.doe@automattic.com',
							'phone' => '+55.11987654321',
							'fax' => null,
						],
						'contact_disclosure' => 'none',
					],
					'admin' => [
						'contact_id' => 'SP1:P-ABC123',
						'contact_information' => [
							'first_name' => 'John',
							'last_name' => 'Doe',
							'organization' => '',
							'address_1' => 'Avenida dos Bandeirantes 123',
							'address_2' => 'Apto 12',
							'postal_code' => '12345-678',
							'city' => 'Sao Paulo',
							'state' => '',
							'country_code' => 'BR',
							'email' => 'john.doe@automattic.com',
							'phone' => '+55.11987654321',
							'fax' => null,
						],
						'contact_disclosure' => 'none',
					],
					'tech' => [
						'contact_id' => 'SP1:P-ABC123',
						'contact_information' => [
							'first_name' => 'John',
							'last_name' => 'Doe',
							'organization' => '',
							'address_1' => 'Avenida dos Bandeirantes 123',
							'address_2' => 'Apto 12',
							'postal_code' => '12345-678',
							'city' => 'Sao Paulo',
							'state' => '',
							'country_code' => 'BR',
							'email' => 'john.doe@automattic.com',
							'phone' => '+55.11987654321',
							'fax' => null,
						],
						'contact_disclosure' => 'none',
					],
					'billing' => [
						'contact_id' => 'SP1:P-ABC123',
						'contact_information' => [
							'first_name' => 'John',
							'last_name' => 'Doe',
							'organization' => '',
							'address_1' => 'Avenida dos Bandeirantes 123',
							'address_2' => 'Apto 12',
							'postal_code' => '12345-678',
							'city' => 'Sao Paulo',
							'state' => '',
							'country_code' => 'BR',
							'email' => 'john.doe@automattic.com',
							'phone' => '+55.11987654321',
							'fax' => null,
						],
						'contact_disclosure' => 'none',
					],
				]
			],
		];

		/** @var Response\Domain\Get\Contacts $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Get\Contacts::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$contact_informations = $response_object->get_contacts()->to_array();
		var_dump( $response_object->get_contacts());
		$this->assertSame( $response_data['data']['contacts'], $contact_informations );
	}
}
