<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Command, Entity, Mock, Response};

class Domain_Check_Test extends Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_names = new Entity\Domain_Names();
		$domain_names->add_domain_name( new Entity\Domain_Name( 'test-domain-name-1.com' ) )
			->add_domain_name( new Entity\Domain_Name( 'test-domain-name-2.com' ) )
			->add_domain_name( new Entity\Domain_Name( 'test-domain-name-3.com' ) );
		$command = new Command\Domain\Check( $domain_names );

		$response_data = get_mock_response( $command, null, 'success' );

		/** @var Response\Domain\Check $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Check::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$availability_data = $response_object->get_domains();
		$this->assertSame( $response_data['data']['domains'], $availability_data );
	}
}
