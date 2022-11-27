<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Dns_Records_Get_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain-name.blog' );
		$command = new Command\Dns\Records\Get( $domain );

		$response_data = Test\Lib\Mock\get_mock_response( $command, $domain->get_name(), 'success' );

		/** @var Response\Dns\Records\Get $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Dns\Records\Get::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$response_dns_records = $response_object->get_dns_records();

		$response_domain_name = $response_dns_records->get_domain();
		$this->assertSame( $domain->get_name(), $response_domain_name->get_name() );

		$response_dns_record_sets = $response_dns_records->get_record_sets();

		$response_dns_record_sets_data = $response_dns_record_sets->to_array();
		$this->assertCount( 2, $response_dns_record_sets_data );

		$response_record_sets = $response_object->get_dns_records()->get_record_sets()->to_array();
		$this->assertIsArray( $response_record_sets );
	}
}
