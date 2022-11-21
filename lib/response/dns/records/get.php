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
