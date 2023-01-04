<?php

namespace Automattic\Domain_Services\Request;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

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
