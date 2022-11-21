<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Mock, Response};

class Domain_Services_Client_Test_Case extends \PHPUnit\Framework\TestCase {
	protected Response\Factory $response_factory;

	public function setUp(): void {
		parent::setUp();
		$this->response_factory = new Response\Factory();
	}

	public function assertIsValidResponse( array $expected_data, Response\Event\Ack $response ): void {
		$this->assertInstanceOf( Response\Response_Interface::class, $response );

		$this->assertIsString( $response->get_server_txn_id() );
		$this->assertEquals( $expected_data['server_txn_id'], $response->get_server_txn_id() );

		$this->assertIsInt( $response->get_timestamp() );
		$this->assertEquals( $expected_data['timestamp'], $response->get_timestamp() );

		$this->assertIsFloat( $response->get_runtime() );
		$this->assertEquals( $expected_data['runtime'], $response->get_runtime() );

		$this->assertIsBool( $response->is_success() );
		$this->assertEquals( $expected_data['success'], $response->is_success() );

		$this->assertIsString( $response->get_client_txn_id() );
		$this->assertEquals( $expected_data['client_txn_id'], $response->get_client_txn_id() );

		$this->assertIsString( $response->get_status_description() );
		$this->assertEquals( $expected_data['status_description'], $response->get_status_description() );
	}
}
