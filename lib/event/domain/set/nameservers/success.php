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

namespace Automattic\Domain_Services_Client\Event\Domain\Set\Nameservers;

use Automattic\Domain_Services_Client\{Entity, Event, Exception};

/**
 * Set name servers success event
 *
 * - This event is generated when a name server update succeeds at the server
 * - Contains a `name_servers` property with the name servers that were set at the registry
 *
 * @see \Automattic\Domain_Services_Client\Command\Domain\Set\Nameservers
 */
class Success implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * Returns the name servers that have been set at the registry.
	 *
	 * @return Entity\Nameservers
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_nameservers(): ?Entity\Nameservers {
		$nameservers_data = $this->get_data_by_key( 'event_data.name_servers' );

		if ( null === $nameservers_data ) {
			return null;
		}

		$domain_names = [];
		foreach ( $nameservers_data as $domain ) {
			$domain_names[] = new Entity\Domain_Name( $domain );
		}

		return new Entity\Nameservers( ... $domain_names );
	}
}
