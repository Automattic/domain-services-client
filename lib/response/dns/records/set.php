<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Dns\Records;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response from a Dns_Record_Set command. Provides access to the domain name, the newly added records and the deleted records.
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_domain_name(): Entity\Domain_Name {
		$domain_name_data = $this->get_data_by_key( 'data.change_set.domain' );
		return new Entity\Domain_Name( $domain_name_data );
	}

	public function get_records_added(): Entity\Dns_Records {
		$domain_name_data = $this->get_data_by_key( 'data.change_set.domain' );
		$records_added_data = $this->get_data_by_key( 'data.change_set.records_added' );

		return Entity\Dns_Records::from_array(
			[
				'domain' => $domain_name_data,
				'record_sets' => $records_added_data,
			]
		);
	}

	public function get_records_deleted(): Entity\Dns_Records {
		$domain_name_data = $this->get_data_by_key( 'data.change_set.domain' );
		$records_deleted_data = $this->get_data_by_key( 'data.change_set.records_deleted' );

		return Entity\Dns_Records::from_array(
			[
				'domain' => $domain_name_data,
				'record_sets' => $records_deleted_data,
			]
		);
	}
}

