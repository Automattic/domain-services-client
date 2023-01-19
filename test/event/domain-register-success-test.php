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

namespace Automattic\Domain_Services\Test\Event;

use Automattic\Domain_Services\{Command, Helper, Event, Response, Test};

class Domain_Register_Success_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_event_success(): void {
		$command = new Command\Event\Details( 1234 );

		$contact_info = [
			'first_name' => 'John',
			'last_name' => 'Doe',
			'organization' => '',
			'address_1' => '60 29th Street #343',
			'address_2' => '',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'registrar@automattic.com',
			'phone' => '+1.8772733049',
			'fax' => null,
		];

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
					'event_class' => 'Domain\Register',
					'event_subclass' => 'Success',
					'object_type' => 'domain',
					'object_id' => 'example.com',
					'event_date' => '2022-01-23 12:34:56',
					'acknowledged_date' => null,
					'event_data' => [
						'domain_status' => [ 'ok' ],
						'agp_end_date' => '2022-01-28 23:45:01',
						'created_date' => '2022-06-24 15:18:08',
						'expiration_date' => '2023-06-24 15:18:08',
						'renewable_until' => '2023-07-29 15:18:08',
						'unverified_contact_suspension_date' => '2022-07-09 15:18:08',
						'contacts' => [
							'owner' => [
								'contact_id' => 'SP1:P-ABC1234',
								'contact_information' => $contact_info,
								'contact_disclosure' => 'none',
							],
							'admin' => [
								'contact_id' => 'SP1:P-ABC1234',
								'contact_information' => $contact_info,
								'contact_disclosure' => 'none',
							],
							'tech' => [
								'contact_id' => 'SP1:P-ABC1234',
								'contact_information' => $contact_info,
								'contact_disclosure' => 'none',
							],
							'billing' => [
								'contact_id' => 'SP1:P-ABC1234',
								'contact_information' => $contact_info,
								'contact_disclosure' => 'none',
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
		$this->assertNotNull( $event );

		$this->assertInstanceOf( Event\Domain\Register\Success::class, $event );
		$this->assertSame( $response_data['data']['event']['object_id'], $event->get_domain()->get_name() );

		$event_contacts = $event->get_contacts();
		foreach ( $event_contacts as $contact_type => $event_contact ) {
			$contact_id = (string) $event_contact->get_contact_id();
			$contact_info = $event_contact->get_contact_information()->to_array();
			$contact_disclosure = $event_contact->get_contact_disclosure()->get_disclose_fields();

			$this->assertSame( $response_data['data']['event']['event_data']['contacts'][ $contact_type ]['contact_id'], $contact_id );
			$this->assertSame( $response_data['data']['event']['event_data']['contacts'][ $contact_type ]['contact_information'], $contact_info );
			$this->assertSame( $response_data['data']['event']['event_data']['contacts'][ $contact_type ]['contact_disclosure'], $contact_disclosure );
		}

		$this->assertSame( $response_data['data']['event']['event_data']['contacts'], $event->get_contacts()->to_array() );
		$this->assertSame( $response_data['data']['event']['event_data']['domain_status'], $event->get_domain_status()->to_array() );
		$this->assertSame( $response_data['data']['event']['event_data']['agp_end_date'], Helper\Date_Time::format( $event->get_agp_end_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['created_date'], Helper\Date_Time::format( $event->get_created_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['expiration_date'], Helper\Date_Time::format( $event->get_expiration_date() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['renewable_until'], Helper\Date_Time::format( $event->get_renewable_until() ) );
		$this->assertSame( $response_data['data']['event']['event_data']['unverified_contact_suspension_date'], Helper\Date_Time::format( $event->get_unverified_contact_suspension_date() ) );
	}
}
