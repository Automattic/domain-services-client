<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Domain_Renew_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Renew( $domain_name, 2022, 1, null );

		$response_data = [
			'data' => [
				'expiration_date' => '2024-06-30 12:00:00',
			],
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '3c933e3a-959c-4646-85f2-612f69450a35.local-isolated-test-request',
			'timestamp' => 1669075524,
			'runtime' => 0.0059,
		];

		/** @var Response\Domain\Renew $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Renew::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$this->assertSame( $response_data['data']['expiration_date'], $response_object->get_expiration_date()->format( Entity\Entity_Interface::DATE_FORMAT ) );
	}
}
