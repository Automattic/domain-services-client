<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Transferlock_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Transferlock\Set( $domain_name, true );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '54466af3-153b-4dc3-99ca-852908d1dd22.local-isolated-test-request',
			'timestamp' => 1669075524,
			'runtime' => 0.0061,
		];

		/** @var Response\Domain\Transferlock\Set $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Transferlock\Set::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );
	}
}
