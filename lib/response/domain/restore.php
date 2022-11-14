<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\Response;

class Restore implements Response\Response_Interface {
	use Response\Data_Trait;
}

//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => 'c74c24d7-b4e3-4a16-8ddb-6407f4e08995.local-isolated-test-request',
//  'timestamp' => 1667838084,
//  'runtime' => 0.0027,
