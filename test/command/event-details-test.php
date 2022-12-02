<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Event_Details_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	use Command\Array_Key_Event_Trait;

	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Event_Details',
			Command\Command_Interface::PARAMS => [
				self::get_event_id_array_key() => 1234,
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-event-ack-test-1',
		];

		$event_id = $mock_command_data[ Command\Command_Interface::PARAMS ][ self::get_event_id_array_key() ];
		$command = new Command\Event\Details( $event_id );
		$command->set_client_txn_id( $mock_command_data[ Command\Command_Interface::CLIENT_TXN_ID ] );

		$this->assertInstanceOf( Command\Event\Details::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertArraysEqual( $mock_command_data, $actual_command_array );
	}
}
