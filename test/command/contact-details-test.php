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

class Contact_Details_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Contact_Id_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Contact_Details',
			Command\Command_Interface::PARAMS => [
				self::get_contact_id_array_key() => 'SP1:P-ABC2134',
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-contact-details-test-1',
		];
		$contact_id = new Entity\Contact_Id( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_contact_id_array_key() ] );
		$command = new Command\Contact\Details( $contact_id );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Contact\Details::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
