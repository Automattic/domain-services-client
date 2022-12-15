<?php declare( strict_types=1 );

namespace Automattic\Domain_Services;

use Automattic\Domain_Services\{Command, Response};

class Api {
	private Configuration $configuration;
	private Response\Factory $response_factory;
	private \Psr\Http\Client\ClientInterface $http_client;

	public function __construct( Configuration $configuration, Response\Factory $response_factory, \Psr\Http\Client\ClientInterface $http_client ) {
		$this->configuration = $configuration;
		$this->response_factory = $response_factory;
		$this->http_client = $http_client;
	}

	/**
	 * @throws \Psr\Http\Client\ClientExceptionInterface
	 * @throws \JsonException
	 */
	public function post( Command\Command_Interface $command, string $client_txn_id = '' ): Response\Response_Interface {
		$command->set_client_txn_id( $client_txn_id );
		$body = json_encode( $command, JSON_THROW_ON_ERROR );
		$resourcePath = $command->get_resource_path();
		$api_host = $this->configuration->get_host();
		$uri = $api_host . $resourcePath;

		$headers = [
			'User-Agent' => $this->configuration->get_user_agent(),
			'X-DSAPI-KEY' => $this->configuration->get_api_key_with_prefix( 'X-DSAPI-KEY' ),
			'X-DSAPI-USER' => $this->configuration->get_api_key_with_prefix( 'X-DSAPI-USER' ),
		];

		$request = new \GuzzleHttp\Psr7\Request( 'POST', $uri, $headers, $body );
		$result = $this->http_client->sendRequest( $request );
		$body = $result->getBody()->getContents();
		$result_data = json_decode( $body, true, 512, JSON_THROW_ON_ERROR );

		return $this->response_factory->build_response( $command, $result_data );
	}
}
