<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Nameservers_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'domain-nameservers-set-test-domain.blog' );
		$name_servers = new Entity\Nameservers(
			new Entity\Domain_Name( 'ns1.example.com' ),
			new Entity\Domain_Name( 'ns2.example.com' ),
		);

		$command = new Command\Domain\Nameservers\Set( $domain, $name_servers );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '6e3f18b1-330c-4f6a-b780-351b999c9bb6.local-isolated-test-request',
			'timestamp' => 1669075520,
			'runtime' => 0.0021,
		];

		/** @var Response\Domain\Nameservers\Set $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Nameservers\Set::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

	}
}
