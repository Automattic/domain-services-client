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

namespace Automattic\Domain_Services\Test\Lib;

use Automattic\Domain_Services\{Api, Configuration, Request, Response};

class Domain_Services_Client_E2e_Test_Case extends Domain_Services_Client_Test_Case {
	protected Api $api;

	public function setUp(): void {
		parent::setUp();

		$config = Configuration::get_default_configuration()
			->set_api_key( 'X-DSAPI-KEY', 'dsapi_key' ) // put test credentials here
			->set_api_key( 'X-DSAPI-USER', 'dsapi_user' );

		$guzzle_http_client = new \GuzzleHttp\Client();
		$http_factory = new \GuzzleHttp\Psr7\HttpFactory();
		$request_factory = new Request\Factory( $http_factory, $http_factory );

		$this->api = new Api(
			$config,
			$request_factory,
			new Response\Factory(),
			$guzzle_http_client,
		);
	}
}
