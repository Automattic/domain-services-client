<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Command};

function get_mock_response( Command\Command_Interface $command, ?string $domain, string $response_type ): array {
	$response = [];

	$command_name = $command::get_name();
	$response_requested = $command_name . '-' . $response_type;

	switch ( $response_requested ) {
		case 'Dns_Records_Get-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => 'f3ef7b83-54b8-4f9c-a0a0-bf94374f1563.local-isolated-test-request',
				'timestamp' => 1668798703,
				'runtime' => 0.0014,
				'data' => [
					'dns_records' => [
						'domain' => $domain,
						'record_sets' => [
							[
								'name' => '@',
								'type' => 'A',
								'ttl' => 300,
								'data' =>
									[
										'1.2.3.4',
										'5.6.7.8',
									],
							],
							[
								'name' => '*',
								'type' => 'CNAME',
								'ttl' => 14400,
								'data' =>
									[
										'test-domain-name.com.',
									],
							],
						],
					],
				],
			];
			break;

		case 'Dns_Records_Set-success':
			$response = [
				'data' => [
					'change_set' => [
						'domain' => $domain,
						'records_added' => [
							[
								'name' => '@',
								'type' => 'A',
								'ttl' => 300,
								'data' =>
									[
										'9.10.11.12',
										'13.14.15.16',
									],
							],
						],
						'records_deleted' => [
							[
								'name' => '@',
								'type' => 'A',
								'ttl' => 300,
								'data' => [
									'1.2.3.4',
									'5.6.7.8',
								],
							],
							[
								'name' => '*',
								'type' => 'CNAME',
								'ttl' => 14400,
								'data' => [
									'test-domain-name.com.',
								],
							],
						],
					],
				],
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => '72f6f165-1328-4989-912b-1dd936e11866.local-isolated-test-request',
				'timestamp' => 1668865903,
				'runtime' => 0.0037,
			];
			break;

		case 'Domain_Contacts_Set-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id-1',
				'server_txn_id' => '729062dd-702c-4a9a-8457-972f72c56184.local-isolated-test-request',
				'timestamp' => 1668625533,
				'runtime' => 0.0069,
				'data' =>
					[
						'contacts' =>
							[
								'owner' =>
									[
										'contact_id' => 'SP1:P-ABC1234',
										'contact_information' => null,
										'contact_disclosure' => 'none',
									],
							],
					],
			];
			break;

		case 'Event_Ack-success':
			$response = [
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id',
				'server_txn_id' => 'a7903cee-043b-4763-b078-737308b5d284.local-isolated-test-request',
				'timestamp' => 1668886944,
				'runtime' => 0.0053,
			];
			break;

		default:
			throw new \RuntimeException( 'Unknown command used in mock response request' );
	}

	return $response;
}
