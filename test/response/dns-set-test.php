<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

namespace Automattic\Domain_Services_Client\Test\Response;

use Automattic\Domain_Services_Client\{Command, Entity, Response, Test};

class Dns_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name_string = 'dns-records-set-test-domain.blog';
		$domain = new Entity\Domain_Name( $domain_name_string );
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
		$command = new Command\Dns\Set( $dns_records );

		$response_data = [
			'data' => [
				'change_set' => [
					'domain' => $domain_name_string,
					'records_added' => [
						[
							'name' => '@',
							'type' => 'A',
							'ttl' => 300,
							'data' =>
								[
									'9.10.11.12',
									'13.14.15.16',
								],
						],
					],
					'records_deleted' => [
						[
							'name' => '@',
							'type' => 'A',
							'ttl' => 300,
							'data' => [
								'1.2.3.4',
								'5.6.7.8',
							],
						],
						[
							'name' => '*',
							'type' => 'CNAME',
							'ttl' => 14400,
							'data' => [
								'test-domain-name.com.',
							],
						],
					],
				],
			],
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '72f6f165-1328-4989-912b-1dd936e11866.local-isolated-test-request',
			'timestamp' => 1668865903,
			'runtime' => 0.0037,
		];

		/** @var Response\Dns\Set $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Dns\Set::class, $response_object );

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

