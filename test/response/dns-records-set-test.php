<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Mock, Response};

class Dns_Records_Set_Test extends Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {

//		array (
//			'command' => 'Dns_Records_Set',
//			'params' =>
//				array (
//					'records' =>
//						array (
//							'domain' => 'test-domain-name.com',
//							'record_sets' =>
//								array (
//									0 =>
//										array (
//											'name' => '@',
//											'type' => 'A',
//											'ttl' => 3600,
//											'data' =>
//												array (
//													0 => '9.10.11.12',
//													1 => '13.14.15.16',
//												),
//										),
//									1 =>
//										array (
//											'name' => '@',
//											'type' => 'TXT',
//											'ttl' => 3600,
//											'data' =>
//												array (
//													0 => 'Hi! I am TXT record!',
//												),
//										),
//								),
//						),
//				),
//			'client_txn_id' => 'test-client-transaction-id',
//			'auth' =>
//				array (
//					0 => 'token',
//				),
//		)
//array (
//	'change_set' =>
//		array (
//			'domain' => 'test-domain-name.com',
//			'records_added' =>
//				array (
//					0 =>
//						array (
//							'name' => '@',
//							'type' => 'A',
//							'ttl' => 300,
//							'data' =>
//								array (
//									0 => '9.10.11.12',
//									1 => '13.14.15.16',
//								),
//						),
//				),
//			'records_deleted' =>
//				array (
//					0 =>
//						array (
//							'name' => '@',
//							'type' => 'A',
//							'ttl' => 300,
//							'data' =>
//								array (
//									0 => '1.2.3.4',
//									1 => '5.6.7.8',
//								),
//						),
//					1 =>
//						array (
//							'name' => '*',
//							'type' => 'CNAME',
//							'ttl' => 14400,
//							'data' =>
//								array (
//									0 => 'test-domain-name.com.',
//								),
//						),
//				),
//		),
//	'status' => 200,
//	'status_description' => 'Command completed successfully',
//	'success' => true,
//	'client_txn_id' => 'test-client-transaction-id',
//	'server_txn_id' => '72f6f165-1328-4989-912b-1dd936e11866.local-isolated-test-request',
//	'timestamp' => 1668865903,
//	'runtime' => 0.0037,
//)


		$domain = new Entity\Domain_Name( 'dns-records-set-test-domain.blog' );
		$dns_record_sets = Entity\Dns_Record_Sets::from_array(
			[
				[
					'name' => '@',
					'type' => 'A',
					'ttl' => 3600,
					'data' => [
						'9.10.11.12',
						'13.14.15.16',
					],
				],
				[
					'name' => '@',
					'type' => 'TXT',
					'ttl' => 3600,
					'data' => [
						'Hi! I am TXT record!',
					],
				],
			],
		);
		$dns_records = new Entity\Dns_Records( $domain, $dns_record_sets );
		$command = new Command\Dns\Records\Set( $dns_records );

		$response_data = get_mock_response( $command, $domain->get_name(), 'success' );

		/** @var Response\Dns\Records\Set $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Dns\Records\Set::class, $response_object );

		$response_dns_records_added = $response_object->get_records_added();
		$response_dns_records_deleted = $response_object->get_records_deleted();

		$response_domain_name_for_added_records = $response_dns_records_added->get_domain();
		$response_domain_name_for_deleted_records = $response_dns_records_deleted->get_domain();
		$this->assertSame( $domain->get_name(), $response_domain_name_for_added_records->get_name() );
		$this->assertSame( $domain->get_name(), $response_domain_name_for_deleted_records->get_name() );

		$response_dns_added_record_sets = $response_dns_records_added->get_record_sets();
		$response_dns_added_record_sets_data = $response_dns_added_record_sets->to_array();
		$this->assertIsArray( $response_dns_added_record_sets_data );
		$this->assertCount( 1, $response_dns_added_record_sets_data );

		$response_dns_deleted_record_sets = $response_dns_records_deleted->get_record_sets();
		$response_dns_deleted_record_sets_data = $response_dns_deleted_record_sets->to_array();
		$this->assertIsArray( $response_dns_deleted_record_sets_data );
		$this->assertCount( 2, $response_dns_deleted_record_sets_data );

	}
}
