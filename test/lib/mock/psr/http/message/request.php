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

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class Request implements \Psr\Http\Message\RequestInterface {
	private Stream $mock_stream;

	public function set_mock_body_from_string( string $content ) {
		$this->mock_stream = new Stream();
		$this->mock_stream->set_mock_stream_from_string( $content );
	}

	public function getProtocolVersion() {
		// TODO: Implement getProtocolVersion() method.
	}

	public function withProtocolVersion( $version ) {
		// TODO: Implement withProtocolVersion() method.
	}

	public function getHeaders() {
		// TODO: Implement getHeaders() method.
	}

	public function hasHeader( $name ) {
		// TODO: Implement hasHeader() method.
	}

	public function getHeader( $name ) {
		// TODO: Implement getHeader() method.
	}

	public function getHeaderLine( $name ) {
		// TODO: Implement getHeaderLine() method.
	}

	public function withHeader( $name, $value ) {
		// TODO: Implement withHeader() method.
	}

	public function withAddedHeader( $name, $value ) {
		// TODO: Implement withAddedHeader() method.
	}

	public function withoutHeader( $name ) {
		// TODO: Implement withoutHeader() method.
	}

	public function getBody() {
		return $this->mock_stream;
		// TODO: Implement getBody() method.
	}

	public function withBody( StreamInterface $body ) {
		// TODO: Implement withBody() method.
	}

	public function getRequestTarget() {
		// TODO: Implement getRequestTarget() method.
	}

	public function withRequestTarget( $requestTarget ) {
		// TODO: Implement withRequestTarget() method.
	}

	public function getMethod() {
		// TODO: Implement getMethod() method.
	}

	public function withMethod( $method ) {
		// TODO: Implement withMethod() method.
	}

	public function getUri() {
		// TODO: Implement getUri() method.
	}

	public function withUri( UriInterface $uri, $preserveHost = false ) {
		// TODO: Implement withUri() method.
	}
}
