<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Dns\Records;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response containing all DNS records associated with a domain.
 */
class Get implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_dns_records(): Entity\Dns_Records {
		$domain_name_data = $this->get_data_by_key( 'data.dns_records.domain' );
		$record_sets_data = $this->get_data_by_key( 'data.dns_records.record_sets' );

		return Entity\Dns_Records::from_array( $domain_name_data, $record_sets_data );
	}
}

//'dns_records' =>
//  array (
//	  'domain' => 'test-domain-name.com',
//	  'record_sets' =>
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
//  'server_txn_id' => 'b52721ea-77de-4300-a649-dd9fbda4320e.local-isolated-test-request',
//  'timestamp' => 1667671464,
//  'runtime' => 0.0036,
//)
