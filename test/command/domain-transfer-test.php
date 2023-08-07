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

namespace Automattic\Domain_Services_Client\Test\Command;

use Automattic\Domain_Services_Client\{Command, Entity, Test};

class Domain_Transfer_Test extends Test\Lib\Domain_Services_Client_Test_Case {

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain\Transfer',
			Command\Command_Interface::PARAMS => [
				Command\Command_Interface::KEY_DOMAIN => 'test-domain-name.com',
				Command\Command_Interface::KEY_CONTACTS => [
					'owner' => [
						Command\Command_Interface::KEY_CONTACT_INFORMATION => [
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
						],
					],
				],
				Command\Command_Interface::KEY_AUTH_CODE => 'test-auth-code',
				Command\Command_Interface::KEY_NAMESERVERS => [
					'ns1.example.com',
					'ns2.example.com',
				],
				Command\Command_Interface::KEY_RECORDS => [
					'domain' => 'test-domain.com',
					'record_sets' => [
						[
							'name' => '@',
							'type' => Entity\Dns_Record_Type::A,
							'ttl' => 3600,
							'data' => [
								'1.1.1.1',
								'2.2.2.2',
							],
						],
					],
				],
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-domain-transfer-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_DOMAIN ] );
		$contacts = Entity\Domain_Contacts::from_array( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_CONTACTS ] );
		$nameservers = new Entity\Nameservers(
			...array_map(
				static fn( $ns ) => new Entity\Domain_Name( $ns ),
				$mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_NAMESERVERS ]
			)
		);
		$auth_code = $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_AUTH_CODE ];
		$dns_records = Entity\Dns_Records::from_array( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_RECORDS ] );

		$command = new Command\Domain\Transfer( $domain, $auth_code, $contacts, $nameservers, $dns_records );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Transfer::class, $command );

		$actual_command_array = $command->jsonSerialize();

		// Add default info to the expected data
		$mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_CONTACTS ]['owner'][ Command\Command_Interface::KEY_CONTACT_ID ] = null;
		$mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_CONTACTS ]['owner'][ Command\Command_Interface::KEY_CONTACT_DISCLOSURE ] = 'none';

		$this->assertArraysEqual( $mock_command_data, $actual_command_array );
	}
}
