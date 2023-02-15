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

namespace Automattic\Domain_Services_Client\Test\Event;

use Automattic\Domain_Services_Client\{Command, Event, Response, Test};

class Domain_Set_Contacts_Fail_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_event_success(): void {
		$command = new Command\Event\Details( 1234 );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '5ffdba44-eeec-4647-9cc4-27cdf8352efc.local-isolated-test-request',
			'timestamp' => 1669075517,
			'runtime' => 0.0019,
			'data' => [
				'event' => [
					'id' => 1234,
					'event_class' => 'Domain\Set\Contacts',
					'event_subclass' => 'Fail',
					'object_type' => 'domain',
					'object_id' => 'example.com',
					'event_date' => '2022-01-23 12:34:56',
					'acknowledged_date' => null,
					'event_data' => [
						'status' => Response\Code::COMMAND_FAILED,
						'status_description' => Response\Code::get_description( Response\Code::COMMAND_FAILED ),
						'client_txn_id' => 'test-client-transaction-id',
						'server_txn_id' => '5ffdba44-eeec-4647-9cc4-27cdf8352efc.local-isolated-test-request',
						'errors' => [
							[
								'description' => 'Missing country code.',
								'extra' => [
									'error_info_1' => 'some information about this error',
								],
							],
							[
								'description' => 'Missing country code.',
								'extra' => [
									'error_info_1' => 'some information about this error',
									'error_info_2' => 'some additional information about this error',
								],
							],
						],
					],
				],
			],
		];

		/** @var Response\Event\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertIsValidResponse( $response_data, $response_object );

		$event = $response_object->get_event();

		$this->assertInstanceOf( Event\Domain\Set\Contacts\Fail::class, $event );
		$this->assertIsValidEvent( $response_data['data']['event'], $event );
	}
}
