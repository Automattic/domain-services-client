<?php declare( strict_types=1 );

function get_mock_response( string $command ): array {
	$response = [];

	switch ( $command ) {
		case 'Domain_Contacts_Set':
			$response = array(
				'status' => 200,
				'status_description' => 'Command completed successfully',
				'success' => true,
				'client_txn_id' => 'test-client-transaction-id-1',
				'server_txn_id' => '729062dd-702c-4a9a-8457-972f72c56184.local-isolated-test-request',
				'timestamp' => 1668625533,
				'runtime' => 0.0069,
				'data' =>
					array(
						'contacts' =>
							array(
								'owner' =>
									array(
										'contact_id' => 'SP1:P-ABC1234',
										'contact_information' => null,
										'contact_disclosure' => 'none',
									),
							),
					),
			);
	}

	return $response;
}
