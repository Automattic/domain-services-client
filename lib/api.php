<?php

namespace Automattic\Domain_Services;

use Automattic\Domain_Services\{Command, Response};
use GuzzleHttp\ClientInterface;

class Api {
	private Configuration $configuration;
	private Response\Factory $response_factory;
	private ClientInterface $guzzle_client;

	public function __construct( Configuration $configuration, Response\Factory $response_factory, \GuzzleHttp\ClientInterface $guzzle_client ) {
		$this->configuration = $configuration;
		$this->response_factory = $response_factory;
		$this->guzzle_client = $guzzle_client;
	}

	/**
	 * @throws \JsonException|\GuzzleHttp\Exception\GuzzleException
	 */
	public function post( Command\Command_Interface $command, string $client_txn_id = '' ): Response\Response_Interface {
		$command->set_client_txn_id( $client_txn_id );
		$body = json_encode( $command, JSON_THROW_ON_ERROR );
		$resourcePath = $command->get_resource_path();
		$api_host = $this->configuration->get_host();
		$uri = $api_host . $resourcePath;

		$headers = [
			'X-DSAPI-KEY' => $this->configuration->get_api_key_with_prefix( 'X-DSAPI-KEY' ),
			'X-DSAPI-USER' => $this->configuration->get_api_key_with_prefix( 'X-DSAPI-USER' ),
		];

		$request = new \GuzzleHttp\Psr7\Request( 'POST', $uri, $headers, $body );
		$result = $this->guzzle_client->send( $request );
		$body = $result->getBody()->getContents();
		$result_data = json_decode( $body, true, 512, JSON_THROW_ON_ERROR );

		return $this->response_factory->build_response( $command, $result_data );
	}
}
