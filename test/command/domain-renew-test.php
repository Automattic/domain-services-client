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

class Domain_Renew_Test extends Test\Lib\Domain_Services_Client_Test_Case {

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain\Renew',
			Command\Command_Interface::PARAMS => [
				Command\Command_Interface::KEY_DOMAIN => 'test-domain-name.com',
				Command\Command_Interface::KEY_CURRENT_EXPIRATION_YEAR => 2022,
				Command\Command_Interface::KEY_FEE_AMOUNT => 5.0,
				Command\Command_Interface::KEY_PERIOD => 1,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-domain-renew-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_DOMAIN ] );
		$current_expiration_year = $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_CURRENT_EXPIRATION_YEAR ];
		$period = $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_PERIOD ];
		$fee_amount = $mock_command_data[ Command\Command_Interface::PARAMS ][ Command\Command_Interface::KEY_FEE_AMOUNT ];
		$command = new Command\Domain\Renew( $domain, $current_expiration_year, $period, $fee_amount );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Renew::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertArraysEqual( $mock_command_data, $actual_command_array );
	}
}
