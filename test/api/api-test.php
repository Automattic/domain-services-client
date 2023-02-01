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

namespace Automattic\Domain_Services_Client\Test\Api;

use Automattic\Domain_Services_Client\{Api, Command, Configuration, Entity, Response, Request, Test};
use Http\Factory\Guzzle\RequestFactory;
use Http\Factory\Guzzle\StreamFactory;
use Psr\Http\Client\ClientExceptionInterface;

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
				new Entity\Contact_Disclosure( \Automattic\Domain_Services_Client\Entity\Contact_Disclosure::NONE )
			)
		);

		// Set up the Contacts\Set command
		$command = new Command\Domain\Set\Contacts( $domain_name, $domain_contacts );

		// Create an optional client transaction ID
		$client_transaction_id = 'client_tx_id_example';

		$mock_response_array = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '729062dd-702c-4a9a-8457-972f72c56184.local-isolated-test-request',
			'timestamp' => 1668625533,
			'runtime' => 0.0069,
			'data' =>
				[
					'contacts' =>
						[
							'owner' =>
								[
									'contact_id' => 'SP1:P-ABC1234',
									'contact_information' => null,
									'contact_disclosure' => 'none',
								],
						],
				],
		];

		$mock_response = new Test\Lib\Mock\Psr\Http\Message\Response();
		$mock_response->set_mock_body_from_array( $mock_response_array );

		$mock_http_client = new Test\Lib\Mock\Psr\Http\Message\Client();
		$mock_http_client->set_mock_response( $mock_response );

		$config = Configuration::get_default_configuration()
			->set_api_key( 'X-DSAPI-KEY', 'YOUR_API_KEY' )
			->set_api_key( 'X-DSAPI-USER', 'YOUR_API_USER' );

		$api = new Api(
			$config,
			new Request\Factory( new RequestFactory(), new StreamFactory() ),
			new Response\Factory(),
			$mock_http_client,
		);

		try {
			// Make the call to the endpoint
			/** @var Response\Domain\Set\Contacts $response */
			$response = $api->post( $command, $client_transaction_id );

			// Extract some data from the response
			$this->assertEquals( $mock_response_array['status'], $response->get_status() );
			$this->assertEquals( $mock_response_array['status_description'], $response->get_status_description() );
			$this->assertEquals( $mock_response_array['status_description'], $response->get_status_description() );
			$this->assertEquals( $mock_response_array['client_txn_id'], $response->get_client_txn_id() );
			$this->assertEquals( $mock_response_array['success'], $response->is_success() );
			$this->assertEquals( $mock_response_array['runtime'], $response->get_runtime() );
			$this->assertEquals( $mock_response_array['timestamp'], $response->get_timestamp() );
			$this->assertEquals( $mock_response_array['server_txn_id'], $response->get_server_txn_id() );
		} catch ( \JsonException $e ) {
			echo 'Exception when calling Domain_Set_Contacts: ', $e->getMessage(), PHP_EOL;
		} catch ( ClientExceptionInterface $e ) {
			echo 'Exception when calling Domain_Set_Contacts: ', $e->getMessage(), PHP_EOL;
		}
	}
}
