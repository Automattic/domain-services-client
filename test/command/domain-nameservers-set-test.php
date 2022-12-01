<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Domain_Nameservers_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Domain_Trait, Command\Array_Key_Nameservers_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain_Nameservers_Set',
			Command\Command_Interface::PARAMS => [
				self::get_domain_name_array_key() => 'test-domain-name.com',
				self::get_nameservers_array_key() => [
					'ns1.example.com',
					'ns2.example.com',
				],
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-domain-nameservers-set-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_domain_name_array_key() ] );
		$nameservers = new Entity\Nameservers(
			...array_map(
				static fn( $ns ) => new Entity\Domain_Name( $ns ),
				$mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_nameservers_array_key() ]
			)
		);
		$command = new Command\Domain\Nameservers\Set( $domain, $nameservers );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Nameservers\Set::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
