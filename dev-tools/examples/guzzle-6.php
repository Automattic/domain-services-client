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

use Automattic\Domain_Services_Client\{Api, Command, Configuration, Entity, Response, Exception};
use \Http\Factory\Guzzle\{RequestFactory, StreamFactory};
use \Http\Adapter\Guzzle6\Client;

class Examples_Guzzle6 {
	public function get_domain_info( $domain ): Response\Domain\Info {
		$domain_name = new Entity\Domain_Name( $domain );
		$command = new Command\Domain\Info( $domain_name );

		try {
			// Init the API client
			$api = $this->init_api_client();

			// Make the call to the endpoint
			return $api->post( $command );
		} catch ( Exception\Domain_Services_Exception $e ) {
			// Handle and log errors
		}
	}

	private function init_api_client(): Api {
		// Configure API key authorization: apiKey
		$config = Configuration::get_default_configuration()
			->set_api_key( 'X-DSAPI-KEY', 'your-key-here' )
			->set_api_key( 'X-DSAPI-USER', 'your-user-here' );

		$http_client = new Client();

		$request_factory = new Request\Factory( new RequestFactory(), new StreamFactory() );
		$response_factory = new Response\Factory();

		return new Api( $config, $request_factory, $response_factory, $http_client );
	}

}

$response = ( new Examples_Guzzle6() )->get_domain_info( 'test.org' );

// Extract some data from the resopnse
echo 'Status: ' . $response->get_status() . PHP_EOL;
echo 'Status description: ' . $response->get_status_description() . PHP_EOL;
echo 'Server Transaction ID: ' . $response->get_server_txn_id() . PHP_EOL;
echo 'Domain Expiration Date: '. $response->get_expiration_date() . PHP_EOL;
