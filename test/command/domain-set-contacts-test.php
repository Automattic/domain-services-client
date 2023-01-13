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

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Domain_Set_Contacts_Test extends Test\Lib\Domain_Services_Client_Test_Case {

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain\Set\Contacts',
			Command\Command_Interface::PARAMS => [
				Command\Command_Interface::KEY_DOMAIN => 'test-domain-name.com',
				Command\Command_Interface::KEY_CONTACTS => [
					'owner' => [
						Command\Command_Interface::KEY_CONTACT_ID => null,
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
						Command\Command_Interface::KEY_CONTACT_DISCLOSURE => Entity\Contact_Disclosure::NONE,
					],
				],
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-dns-records-get-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_DOMAIN ] );
		$contacts = Entity\Domain_Contacts::from_array( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_CONTACTS ] );
		$command = new Command\Domain\Set\Contacts( $domain, $contacts );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Set\Contacts::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
