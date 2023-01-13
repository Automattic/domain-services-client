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

namespace Automattic\Domain_Services\Command;

trait Command_Trait {
	private string $client_txn_id = '';

	/**
	 * Gets the client transaction ID set for this command.
	 *
	 * @return string
	 */
	final public function get_client_txn_id(): string {
		return $this->client_txn_id;
	}

	/**
	 * Sets the client transaction ID for this command. This optional value may be set by the reseller. It will be
	 * reflected in the corresponding Response class and may be useful for logging and debugging.
	 *
	 * @param string $client_txn_id
	 */
	final public function set_client_txn_id( string $client_txn_id ): void {
		$this->client_txn_id = $client_txn_id;
	}

	/**
	 * Returns the command name that can be used to build command data
	 *
	 * @return string
	 */
	final public static function get_name(): string {
		return substr( static::class, strlen( __NAMESPACE__ . '\\' ) );
	}
}
