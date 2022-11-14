<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Dns\Records;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response from a Dns_Record_Set command. Provides access to the domain name, the newly added records and the deleted records.
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_domain_name(): Entity\Domain_Name {
		return $this->get_domain_name_from_response_data( 'change_set.domain' );
	}

	public function get_records_added(): Entity\Dns_Records {
		$domain_name_data = $this->get_data_by_key( 'change_set.domain' );
		$record_sets_data = $this->get_data_by_key( 'change_set.records_added' );

		return Entity\Dns_Records::from_array( $domain_name_data, $record_sets_data );
	}

	public function get_records_deleted(): Entity\Dns_Records {
		$domain_name_data = $this->get_data_by_key( 'change_set.domain' );
		$record_sets_data = $this->get_data_by_key( 'change_set.records_deleted' );

		return Entity\Dns_Records::from_array( $domain_name_data, $record_sets_data );
	}
}

//'change_set' =>
//  array (
//	  'domain' => 'test-domain-name.com',
//	  'records_added' =>
//		  array (
//			  0 =>
//				  array (
//					  'name' => '@',
//					  'type' => 'A',
//					  'ttl' => 300,
//					  'data' =>
//						  array (
//							  0 => '9.10.11.12',
//							  1 => '13.14.15.16',
//						  ),
//				  ),
//		  ),
//	  'records_deleted' =>
//		  array (
//			  0 =>
//				  array (
//					  'name' => '@',
//					  'type' => 'A',
//					  'ttl' => 300,
//					  'data' =>
//						  array (
//							  0 => '1.2.3.4',
//							  1 => '5.6.7.8',
//						  ),
//				  ),
//			  1 =>
//				  array (
//					  'name' => '*',
//					  'type' => 'CNAME',
//					  'ttl' => 14400,
//					  'data' =>
//						  array (
//							  0 => 'test-domain-name.com.',
//						  ),
//				  ),
//		  ),
//  ),
//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => 'f52caf64-8f60-4871-8a4b-a99d2e001bc3.local-isolated-test-request',
//  'timestamp' => 1667671342,
//  'runtime' => 0.0024,
//)
