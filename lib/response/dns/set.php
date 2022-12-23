<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

namespace Automattic\Domain_Services\Response\Dns;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response of a Dns\Set command
 *
 * Contains the domain name, the newly added records and the deleted records.
 *
 * @see \Automattic\Domain_Services\Command\Dns\Set
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Returns the domain name for which DNS records were updated
	 *
	 * @return Entity\Domain_Name
	 */
	public function get_domain_name(): Entity\Domain_Name {
		$domain_name_data = $this->get_data_by_key( 'data.change_set.domain' );
		return new Entity\Domain_Name( $domain_name_data );
	}

	/**
	 * Returns the DNS records that were added
	 *
	 * @return Entity\Dns_Records
	 */
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

	/**
	 * Returns the DNS records that were deleted
	 *
	 * @return Entity\Dns_Records
	 */
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

