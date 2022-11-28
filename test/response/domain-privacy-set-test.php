<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Privacy_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain-name.blog' );
		$whois_privacy_settings = new Entity\Whois_Privacy( Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE );

		$command = new Command\Domain\Privacy\Set( $domain, $whois_privacy_settings );

		$mock_response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => 'd0befeca-b291-460d-bf32-59e84b3e4428.local-isolated-test-request',
			'timestamp' => 1669075523,
			'runtime' => 0.0029,
		];

		/** @var Response\Domain\Privacy\Set $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Privacy\Set::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );
	}
}
