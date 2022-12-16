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

namespace Automattic\Domain_Services\Test\Api;

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Response, Test};

class ApiTest extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_api_success(): void {
		// Set the domain to use
		$domain_name = new Entity\Domain_Name( 'a8ctest.com' );

		// Set up a new domain contact
		$domain_contacts = new Entity\Domain_Contacts(
			new Entity\Domain_Contact(
				null,
				new Entity\Contact_Information(
					'Del',
					'Putnam',
					'',
					'904 River Rd',
					'',
					'23601',
					'Newport News',
					'VA',
					'US',
					'del@putnams.net',
					'+1.7577468269',
					null
				),
				new Entity\Contact_Disclosure( \Automattic\Domain_Services\Entity\Contact_Disclosure::NONE )
			)
		);

		// Set up the Contacts\Set command
		$command = new Command\Domain\Contacts\Set( $domain_name, $domain_contacts );

		// Create an optional client transaction ID
		$client_transaction_id = 'client_tx_id_example';

		$mock_response_array = Test\Lib\Mock\get_mock_response( $command, $domain_name->get_name(), 'success' );

		$mock_response = new Test\Lib\Mock\Psr\Http\Message\Response();
		$mock_response->set_mock_body_from_array( $mock_response_array );

		$mock_http_client = new Test\Lib\Mock\Psr\Http\Message\Client();
		$mock_http_client->set_mock_response( $mock_response );

		$config = Configuration::get_default_configuration()
			->set_api_key( 'X-DSAPI-KEY', 'YOUR_API_KEY' )
			->set_api_key( 'X-DSAPI-USER', 'YOUR_API_USER' );

		$api = new Api(
			$config,
			new Response\Factory(),
			$mock_http_client,
		);

		try {
			// Make the call to the endpoint
			/** @var Response\Domain\Contacts\Set $response */
			$response = $api->post( $command, $client_transaction_id );

			// Extract some data from the resopnse
			$this->assertEquals( $mock_response_array['status'], $response->get_status() );
			$this->assertEquals( $mock_response_array['status_description'], $response->get_status_description() );
			$this->assertEquals( $mock_response_array['status_description'], $response->get_status_description() );
			$this->assertEquals( $mock_response_array['client_txn_id'], $response->get_client_txn_id() );
			$this->assertEquals( $mock_response_array['success'], $response->is_success() );
			$this->assertEquals( $mock_response_array['runtime'], $response->get_runtime() );
			$this->assertEquals( $mock_response_array['timestamp'], $response->get_timestamp() );
			$this->assertEquals( $mock_response_array['server_txn_id'], $response->get_server_txn_id() );
		} catch ( \Automattic\Domain_Services\Exception\Domain_Services_Exception $e ) {
			echo 'Exception when calling Domain_Contacts_Set: ', $e->getMessage(), PHP_EOL;
			var_dump( $e->getCode() );
			var_dump( $e->getMessage() );
		}
	}
}
