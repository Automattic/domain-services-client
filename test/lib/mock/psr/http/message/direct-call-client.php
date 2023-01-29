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

namespace Automattic\Domain_Services_Client\Test\Lib\Mock\Psr\Http\Message;

use Automattic\Domain_Services\{Controller, Entity};

class Direct_Call_Client implements \Psr\Http\Client\ClientInterface {
	private Controller\Common $controller;

	public function __construct( Controller\Common $controller ) {
		$this->controller = $controller;
	}

	public function sendRequest( \Psr\Http\Message\RequestInterface $request ): \Psr\Http\Message\ResponseInterface {
		$command = json_decode( $request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR );
		// var_dump( $command );

		$request_response = $this->controller->process_request( new Entity\Reseller(), $command );
		// var_dump( $request_response->to_array() );

		$response = new Response();
		$response->set_mock_body_from_array( $request_response->to_array() );
		return $response;
	}
}
