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

namespace Automattic\Domain_Services_Client\Response\Dns;

use Automattic\Domain_Services_Client\{Entity, Exception, Response};

/**
 * Response of a `Dns\Get` command
 *
 * Contains all DNS records associated with a domain, which can be accessed using the `get_dns_records` method.
 *
 * @see \Automattic\Domain_Services_Client\Command\Dns\Set
 */
class Get implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Returns the DNS records associated with a domain
	 *
	 * @return Entity\Dns_Records
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_dns_records(): Entity\Dns_Records {
		$dns_records_data = $this->get_data_by_key( 'data.dns_records' );

		return Entity\Dns_Records::from_array( $dns_records_data );
	}
}
