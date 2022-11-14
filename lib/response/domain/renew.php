<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\Response;

class Renew implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_expiration_date(): ?string {
		return $this->get_data_by_key( 'expiration_date' );
	}
}

//  'expiration_date' => '2024-06-30 12:00:00',
//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => '2dcec850-4277-48ff-a421-21292a2aa210.local-isolated-test-request',
//  'timestamp' => 1667837944,
//  'runtime' => 0.0038,
