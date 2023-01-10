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

namespace Automattic\Domain_Services;

use Automattic\Domain_Services\{Command, Exception, Response, Request};
use Psr\Http\Client;

class Api {
	private Configuration $configuration;
	/**
	 * @var Request\Factory
	 */
	private Request\Factory $request_factory;
	/**
	 * @var Response\Factory
	 */
	private Response\Factory $response_factory;
	/**
	 * @var Client\ClientInterface
	 */
	private Client\ClientInterface $http_client;

	public function __construct( Configuration $configuration, Request\Factory $request_factory, Response\Factory $response_factory, Client\ClientInterface $http_client ) {
		$this->configuration = $configuration;
		$this->request_factory = $request_factory;
		$this->response_factory = $response_factory;
		$this->http_client = $http_client;
	}

	/**
	 * @param Command\Command_Interface $command
	 * @param string                    $client_txn_id
	 *
	 * @return Response\Response_Interface
	 * @throws Exception\Command\Invalid_Format_Exception
	 * @throws Exception\Command\Missing_Option_Exception
	 * @throws Exception\Domain_Services_Exception
	 * @throws \JsonException
	 * @throws Client\ClientExceptionInterface
	 */
	public function post( Command\Command_Interface $command, string $client_txn_id = '' ): Response\Response_Interface {
		$command->set_client_txn_id( $client_txn_id );
		$body = json_encode( $command, JSON_THROW_ON_ERROR );
		$uri = $this->configuration->get_host();

		$headers = [
			'User-Agent' => $this->configuration->get_user_agent(),
			'X-DSAPI-KEY' => $this->configuration->get_api_key_with_prefix( 'X-DSAPI-KEY' ),
			'X-DSAPI-USER' => $this->configuration->get_api_key_with_prefix( 'X-DSAPI-USER' ),
		];

		$request = $this->request_factory->createRequest( 'POST', $uri, $body, $headers );
		$result = $this->http_client->sendRequest( $request );
		$body = $result->getBody()->getContents();
		$result_data = json_decode( $body, true, 512, JSON_THROW_ON_ERROR );

		return $this->response_factory->build_response( $command, $result_data );
	}
}
