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

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Response, Test};

class Event_Details_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$command = new Command\Event\Details( 1234 );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '7577b593-0cc4-457a-ac91-a71ea435effd.local-isolated-test-request',
			'timestamp' => 1668886944,
			'runtime' => 0.0041,
			'data' => [
				'event' => [
					'id' => 1234,
					'event_class' => 'Domain_Set_Nameservers',
					'event_subclass' => 'Success',
					'event_data' => '[]',
					'object_type' => 'domain',
					'object_id' => 'example.com',
					'event_date' => '2022-08-01 01:23:45',
					'acknowledged_date' => '2022-08-02 06:07:08',
				],
			],
		];

		/** @var Response\Event\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertIsValidResponse( $response_data, $response_object );

		$event = $response_object->get_event();
		$this->assertNotNull( $event );

		$expected_response_data = $response_data['data']['event'];

		$this->assertEquals( $expected_response_data['event_date'], $event->get_event_date()->format( 'Y-m-d H:i:s' ) );
		$this->assertEquals( $expected_response_data['acknowledged_date'], $event->get_acknowledged_date()->format( 'Y-m-d H:i:s' ) );
		$this->assertEquals( $expected_response_data['event_class'], $event->get_event_class() );
		$this->assertEquals( $expected_response_data['event_data'], json_encode( $event->get_event_data(), JSON_THROW_ON_ERROR ) );
		$this->assertEquals( $expected_response_data['event_subclass'], $event->get_event_subclass() );
		$this->assertEquals( $expected_response_data['id'], $event->get_id() );
		$this->assertEquals( $expected_response_data['object_id'], $event->get_object_id() );
		$this->assertEquals( $expected_response_data['object_type'], $event->get_object_type() );
	}
}
