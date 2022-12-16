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

interface Command_Interface {
	public const COMMAND = 'command';
	public const PARAMS = 'params';
	public const CLIENT_TXN_ID = 'client_txn_id';

	/**
	 * Returns the command name that can be used to build command data
	 *
	 * @return string
	 */
	public static function get_name(): string;

	/**
	 * Gets the client transaction ID
	 *
	 * @return string
	 */
	public function get_client_txn_id(): string;

	/**
	 * Sets the client transaction ID
	 *
	 * @param string $client_txn_id
	 * @return void
	 */
	public function set_client_txn_id( string $client_txn_id ): void;
}
