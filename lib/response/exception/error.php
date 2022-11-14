<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Exception;

use Automattic\Domain_Services\{Response};

class Error implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_invalid_option(): ?string {
		return $this->get_data_by_key( 'invalid_option' );
	}

	public function get_reason(): ?string {
		return $this->get_data_by_key( 'reason' );
	}

	public function get_command(): ?string {
		return $this->get_data_by_key( 'command_data.command' );
	}

	public function get_command_params(): ?array {
		return $this->get_data_by_key( 'command_data.params' );
	}
}

//  'invalid_option' => 'contacts',
//  'reason' => 'The owner contact information cannot be null.',
//  'command_data' =>
//  array (
//	  'command' => 'Domain_Register',
//	  'params' =>
//		  array (
//			  'domain' => 'test-domain-name.com',
//			  'contacts' =>
//				  array (
//				  ),
//		  ),
//	  'client_txn_id' => 'test-client-transaction-id-1',
//	  'auth' =>
//		  array (
//			  0 => 'token',
//		  ),
//  ),
//  'status' => 502,
//  'status_description' => 'Invalid entity value',
//  'success' => false,
//  'client_txn_id' => 'test-client-transaction-id-1',
//  'server_txn_id' => 'f046ded1-3d21-4f3c-855a-d78aafd6a956.local-isolated-test-request',
//  'timestamp' => 1667878654,
//  'runtime' => 0.0004,
