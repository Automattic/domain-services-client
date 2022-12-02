<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Domain_Privacy_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Domain_Trait, Command\Array_Key_Privacy_Setting_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Domain_Privacy_Set',
			Command\Command_Interface::PARAMS => [
				self::get_domain_name_array_key() => 'test-domain-name.com',
				self::get_privacy_setting_array_key() => Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-domain-privacy-set-test-1',
		];

		$domain = new Entity\Domain_Name( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_domain_name_array_key() ] );
		$privacy_setting = new Entity\Whois_Privacy( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_privacy_setting_array_key() ] );
		$command = new Command\Domain\Privacy\Set( $domain, $privacy_setting );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Domain\Privacy\Set::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}