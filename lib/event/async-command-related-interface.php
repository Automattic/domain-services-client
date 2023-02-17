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

namespace Automattic\Domain_Services_Client\Event;

/**
 * Implemented by all events resulting from running an asynchronous command
 */
interface Async_Command_Related_Interface {
	/**
	 * Gets the status code for this event
	 *
	 * @return int
	 */
	public function get_command_status(): ?int;

	/**
	 * Gets a description of the status code meaning
	 *
	 * @return string
	 */
	public function get_command_status_description(): ?string;

	/**
	 * Gets the client_txn_id from the command related to this event, if any
	 *
	 * @return string
	 */
	public function get_command_client_txn_id(): ?string;

	/**
	 * Gets the server_txn_id from the command related to this event, if any
	 *
	 * @return string
	 */
	public function get_command_server_txn_id(): ?string;
}
