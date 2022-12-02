<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Dns_Records_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Dns_Record_Sets_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Dns_Records_Trait, Command\Array_Key_Dns_Record_Sets_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Dns_Records_Set',
			Command\Command_Interface::PARAMS => [
				self::get_dns_records_array_key() => [
					self::get_domain_name_array_key() => 'test-domain-name.com',
					self::get_dns_record_sets_array_key() => [
						[
							'name' => '@',
							'type' => 'A',
							'ttl' => 3600,
							'data' => [
								'1.2.3.4',
								'5.6.7.8',
							],
						],
						[
							'name' => '@',
							'type' => 'TXT',
							'ttl' => 3600,
							'data' => [
								'data for this TXT record',
							],
						],
					],
				],
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-dns-records-get-test-1',
		];

		$dns_records = Entity\Dns_Records::from_array( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_dns_records_array_key() ] );
		$command = new Command\Dns\Records\Set( $dns_records );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Dns\Records\Set::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}