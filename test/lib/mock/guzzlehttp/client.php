<?php
/*
 * Copyright (c) 2023 Automattic, Inc.
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

namespace Automattic\Domain_Services\Test\Lib\Mock\GuzzleHttp;

use \GuzzleHttp\ClientInterface;

use \Automattic\Domain_Services\Test\Lib\Mock\Psr\Http\Message\Response;
use \Psr\Http\Message\RequestInterface;

class Client implements ClientInterface {
	private Response $mock_response;

	public function set_mock_response( Response $response ): void {
		$this->mock_response = $response;
	}

	public function request( $method, $uri = '', array $options = [] ) {
		return $this->mock_response;
	}

	public function send( RequestInterface $request, array $options = [] ) {
		return $this->mock_response;
	}

	public function sendAsync( RequestInterface $request, array $options = [] ) {
		return $this->mock_response;
	}

	public function requestAsync( $method, $uri, array $options = [] ) {
		return $this->mock_response;
	}

	public function getConfig( $option = null ) {
		return $this->mock_response;
	}
}
