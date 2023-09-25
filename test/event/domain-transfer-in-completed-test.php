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

use Automattic\Domain_Services_Client\{Command, Helper, Event, Response, Test};

class Domain_Transfer_In_Success_Test extends Test\Lib\Domain_Services_Client_Test_Case {
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
					'event_class' => 'Domain\Transfer\In',
					'event_subclass' => 'Completed',
					'object_type' => 'domain',
					'object_id' => 'example.com',
					'event_date' => '2022-01-23 12:34:56',
					'acknowledged_date' => null,
					'event_data' => [
						'current_registrar' => 'losing_registrar',
						'requesting_registrar' => 'automattic',
						'auto_nack' => false,
						'request_date' => '2022-12-08 18:03:16',
						'execute_date' => '2022-12-08 18:03:44',
						'transfer_status' => 'clientApproved',
						'renewable_until' => '2023-12-08 18:03:44',
						'created_date' => '2022-01-23 12:34:56',
						'expiration_date' => '2023-01-23 12:34:56',
						'unverified_contact_suspension_date' => '2022-01-23 12:34:56',
						'transferlocked_until_date' => '2023-07-10 14:34:14',
					],
				],
			],
		];

		/** @var Response\Event\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertIsValidResponse( $response_data, $response_object );

		$event = $response_object->get_event();
		$this->assertNotNull( $event );

		$this->assertInstanceOf( Event\Domain\Transfer\In\Completed::class, $event );
		$this->assertIsValidEvent( $response_data['data']['event'], $event );
		$this->assertSame( $response_data['data']['event']['event_data']['current_registrar'], $event->get_current_registrar() );
		$this->assertSame( $response_data['data']['event']['event_data']['requesting_registrar'], $event->get_requesting_registrar() );
		$this->assertSame( $response_data['data']['event']['event_data']['auto_nack'], $event->get_auto_nack() );
		$this->assertSame( $response_data['data']['event']['event_data']['request_date'], Helper\Date_Time::format( $event->get_request_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['execute_date'], Helper\Date_Time::format( $event->get_execute_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['transfer_status'], $event->get_transfer_status() );
		$this->assertSame( $response_data['data']['event']['event_data']['renewable_until'], Helper\Date_Time::format( $event->get_renewable_until() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['created_date'], Helper\Date_Time::format( $event->get_created_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['expiration_date'], Helper\Date_Time::format( $event->get_expiration_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['unverified_contact_suspension_date'], Helper\Date_Time::format( $event->get_unverified_contact_suspension_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['transferlocked_until_date'], Helper\Date_Time::format( $event->get_transferlocked_until_date() ) );
	}
}
