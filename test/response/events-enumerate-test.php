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

use Automattic\Domain_Services_Client\{Command, Helper, Response, Test};

class Event_Enumerate_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$command = new Command\Event\Enumerate();

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => 'e5b5f2de-099f-4469-9e0b-724e53d3f241.local-isolated-test-request',
			'timestamp' => 1668865904,
			'runtime' => 0.0028,
			'data' => [
				'total_count' => 3,
				'events' => [
					[
						'id' => 1,
						'event_class' => 'Domain\Renew',
						'event_subclass' => 'Success',
						'event_data' => [
							'expiration_date' => '2023-01-01 01:23:45',
							'renewable_until' => '2023-02-13 01:23:45',
							'domain_status' => [ 'clientTransferProhibited' ]
						],
						'object_type' => 'domain',
						'object_id' => 'example.com',
						'event_date' => '2022-01-01 00:00:00',
						'acknowledged_date' => '2022-01-01 10:00:00',
					],
					[
						'id' => 2,
						'event_class' => 'Domain\Renew',
						'event_subclass' => 'Success',
						'event_data' => [
							'expiration_date' => '2023-01-01 01:23:45',
							'renewable_until' => '2023-02-13 01:23:45',
							'domain_status' => [ 'clientTransferProhibited' ]
						],
						'object_type' => 'domain',
						'object_id' => 'example.com',
						'event_date' => '2022-02-01 00:00:00',
						'acknowledged_date' => NULL,
					],
					[
						'id' => 3,
						'event_class' => 'Domain\Renew',
						'event_subclass' => 'Success',
						'event_data' => [
							'expiration_date' => '2023-01-01 01:23:45',
							'renewable_until' => '2023-02-13 01:23:45',
							'domain_status' => [ 'clientTransferProhibited' ]
						],
						'object_type' => 'domain',
						'object_id' => 'example.com',
						'event_date' => '2022-03-01 00:00:00',
						'acknowledged_date' => NULL,
					],
				],
				'request_params' => [
					'filter' => NULL,
					'first' => 0,
					'limit' => 50,
					'date_start' => NULL,
					'date_end' => NULL,
					'show_acknowledged' => true,
				],
			],
		];

		/** @var Response\Event\Enumerate $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertIsValidResponse( $response_data, $response_object );

		$this->assertInstanceOf( Response\Event\Enumerate::class, $response_object );

		$events = $response_object->get_events();
		$request_params = $response_object->get_request_params();
		$total_count = $response_object->get_total_count();

		foreach ( $events as $index => $event ) {
			$this->assertEquals( $response_data['data']['events'][ $index ]['object_type'], $event->get_object_type() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['object_id'], $event->get_object_id() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['event_subclass'], $event->get_event_subclass() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['event_class'], $event->get_event_class() );
			$this->assertEquals( $response_data['data']['events'][ $index ]['event_date'], Helper\Date_Time::format( $event->get_event_date() ) );
			$acknowledge_date = $event->get_acknowledged_date();
			$acknowledge_date = ( null === $acknowledge_date ) ? null : Helper\Date_Time::format( $acknowledge_date );
			$this->assertEquals( $response_data['data']['events'][ $index ]['acknowledged_date'], $acknowledge_date );
		}

		$this->assertEquals( $response_data['data']['total_count'], $total_count );
		$this->assertSame( $response_data['data']['request_params'], $request_params );
	}
}
