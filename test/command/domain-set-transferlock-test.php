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

class Domain_Set_Transferlock_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Domain_Trait;
	use Command\Array_Key_Transferlock_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain\Set\Transferlock',
			Command\Command_Interface::PARAMS => [
				self::get_domain_name_array_key() => 'test-domain-name.com',
				self::get_transferlock_array_key() => true,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-domain-transferlock-set-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_domain_name_array_key() ] );
		$command = new Command\Domain\Set\Transferlock( $domain, $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_transferlock_array_key() ] );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Set\Transferlock::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
