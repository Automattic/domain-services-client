<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Command;

use Automattic\Domain_Services\{Command, Entity, Test};

class Contact_Details_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_command_instance_success(): void {
		$mock_command_data = [
			Command\Command_Interface::COMMAND => 'Contact_Details',
			Command\Command_Interface::PARAMS => [
				'contact_id' => 'SP1:P-ABC2134',
			],
			Command\Command_Interface::CLIENT_TXN_ID => 'client-transaction-info-for-contact-details-test-1',
		];
		$contact_id = new Entity\Contact_Id( $mock_command_data['params']['contact_id'] );
		$command = new Command\Contact\Details( $contact_id );
		$command->set_client_txn_id( $mock_command_data['client_txn_id'] );

		$this->assertInstanceOf( Command\Contact\Details::class, $command );

		$actual_command_array = $command->jsonSerialize();

		$this->assertSame( $mock_command_data, $actual_command_array );
	}
}
