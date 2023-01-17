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

namespace Automattic\Domain_Services\Request;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * @internal
 */
class Factory {

	private RequestFactoryInterface $request_factory;
	private StreamFactoryInterface $stream_factory;

	public function __construct( RequestFactoryInterface $request_factory, StreamFactoryInterface $stream_factory ) {
		$this->request_factory = $request_factory;
		$this->stream_factory = $stream_factory;
	}

	/**
	 * @param string $method
	 * @param string $uri
	 * @param string $body
	 * @param array  $headers
	 *
	 * @return RequestInterface
	 */
	public function createRequest( string $method, string $uri, string $body = '', array $headers = []): RequestInterface {
		$request = $this->request_factory->createRequest( $method, $uri );
		$body_stream = $this->stream_factory->createStream( $body );

		foreach ( $headers as $name => $value ) {
			$request = $request->withHeader( $name, $value );
		}

		return $request->withBody( $body_stream );
	}
}
