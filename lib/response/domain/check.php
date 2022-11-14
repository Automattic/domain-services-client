<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\Response;

class Check implements Response\Response_Interface {
	use Response\Data_Trait;

	public const DOMAINS = 'domains';

	// Availability data
	public const AVAILABLE = 'available';
	public const FEE_CLASS = 'fee_class';
	public const FEE_AMOUNT = 'fee_amount';

	// Fee amount specific (premium domains only)
	public const FEE_AMOUNT_NEW = 'fee_amount_new';
	public const FEE_AMOUNT_RENEWAL = 'fee_amount_renewal';
	public const FEE_AMOUNT_TRANSFER = 'fee_amount_transfer';

	/**
	 * Gets the availability information for a list of domain from the response.
	 *
	 * @return array
	 */
	public function get_domain(): array {
		return $this->get_data_by_key( 'domains' ) ?? [];
	}
}

//'domains' =>
//  array (
//	  'test-mock-domain-01.com' =>
//		  array (
//			  'available' => true,
//			  'fee_class' => 'standard',
//		  ),
//	  'test-mock-domain-02.com' =>
//		  array (
//			  'available' => true,
//			  'fee_class' => 'standard',
//		  ),
//  ),
//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => '5a665a0f-32eb-4882-8c19-0bb28b6c35fc.local-isolated-test-request',
//  'timestamp' => 1667777790,
//  'runtime' => 0.0002,
