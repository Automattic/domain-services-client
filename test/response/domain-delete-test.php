<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Command, Entity, Mock, Response};

class Domain_Delete_Test extends Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Delete( $domain_name );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '33b6f31e-91c2-452a-b88c-5a5c22ff98c9.local-isolated-test-request',
			'timestamp' => 1669075519,
			'runtime' => 0.0023,
		];

		/** @var Response\Domain\Delete $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Delete::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );
	}
}
