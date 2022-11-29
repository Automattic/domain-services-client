<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Dns_Records_Get_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Domain_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Dns_Records_Get',
			Command\Command_Interface::PARAMS => [
				self::get_domain_name_array_key() => 'test-domain-name.com',
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-dns-records-get-test-1',
		];
		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_domain_name_array_key() ] );
		$command = new Command\Dns\Records\Get( $domain );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Dns\Records\Get::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
