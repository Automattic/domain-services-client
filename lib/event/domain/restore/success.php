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

namespace Automattic\Domain_Services\Event\Domain\Restore;

use Automattic\Domain_Services\{Entity, Event, Helper, Exception};

/**
 * Success event for a `Domain\Restore` command.
 *
 * This event is sent when a restore operation succeeds.
 *
 * @see \Automattic\Domain_Services\Command\Domain\Restore
 */
class Success implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * Gets the status of the domain immediately after the restore operation.
	 *
	 * @return Entity\Epp_Status_Codes
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_domain_status(): Entity\Epp_Status_Codes {
		$epp_statuses_data = $this->get_data_by_key( 'event_data.domain_status' );
		$epp_statuses = [];
		foreach ( $epp_statuses_data as $epp_status_data ) {
			$epp_statuses[] = new Entity\Epp_Status_Code( $epp_status_data );
		}
		return new Entity\Epp_Status_Codes( ...$epp_statuses );
	}

	/**
	 * Gets the expiration date of the domain after the restore operation.
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_expiration_date(): ?\DateTimeInterface {
		$expiration_date = $this->get_data_by_key( 'event_data.expiration_date' );
		return null === $expiration_date ? null : Helper\Date_Time::createImmutable( $expiration_date );
	}

	/**
	 * Gets the renewal date of the domain after the restore operation.
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_renewable_until(): ?\DateTimeInterface {
		$renewable_until = $this->get_data_by_key( 'event_data.renewable_until' );
		return null === $renewable_until ? null : Helper\Date_Time::createImmutable( $renewable_until );
	}
}
