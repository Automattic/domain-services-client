<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Events_Get_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Event_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Events_Get',
			Command\Command_Interface::PARAMS => [
				self::get_event_show_acknowledged_array_key() => false,
				self::get_event_limit_array_key() => 50,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-events-get-test-1',
		];

		$command = new Command\Events\Get();
		$command->set_show_acknowledged( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_show_acknowledged_array_key() ] );
		$command->set_limit( $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_limit_array_key() ] );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Events\Get::class, $command );

		$actual_command_array = $command->jsonSerialize();

		// Add default info to the expected data
		$mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_date_start_array_key() ] = null;
		$mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_date_end_array_key() ] = null;
		$mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_filter_array_key() ] = null;
		$mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_first_array_key() ] = null;

		$this->assertArraysEqual( $mock_command_data, $actual_command_array );
	}
}
