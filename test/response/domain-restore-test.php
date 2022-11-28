<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Restore_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Restore( $domain_name );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => 'a819578a-6101-43cb-b55f-d1986215804b.local-isolated-test-request',
			'timestamp' => 1669075524,
			'runtime' => 0.0021,
		];

		/** @var Response\Domain\Restore $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Restore::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );
	}
}
