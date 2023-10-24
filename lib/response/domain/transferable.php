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

namespace Automattic\Domain_Services_Client\Response\Domain;

use Automattic\Domain_Services_Client\{Response};

/**
 * Response of a `Domain\Transferable` command
 *
 * This is the response returned from a successful execution of the `Domain\Transferable` command.
 */
class Transferable implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Returns true if the domain can be transferred
	 *
	 * @return bool
	 */
	public function get_transferable(): bool {
		return $this->get_data_by_key( 'data.transferable' );
	}

	/**
	 * Returns true if the domain is currently pending transfer
	 *
	 * @return bool
	 */
	public function get_pending_transfer(): bool {
		return $this->get_data_by_key( 'data.pending_transfer' );
	}

	/**
	 * Returns true if the epp status of the domain prevent it from being transferred
	 *
	 * @return bool
	 */
	public function get_transferlock(): bool {
		return $this->get_data_by_key( 'data.transferlock' );
	}

	/**
	 * Returns true if the domain has been registered less than 60 days ago
	 *
	 * @return bool
	 */
	public function get_registered_within_60_days(): bool {
		return $this->get_data_by_key( 'data.registered_within_60_days' );
	}
}
