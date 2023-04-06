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

namespace Automattic\Domain_Services_Client\Command;

/**
 * Interface implemented by all commands
 */
interface Command_Interface {
	public const COMMAND = 'command';
	public const PARAMS = 'params';
	public const CLIENT_TXN_ID = 'client_txn_id';

	/**
	 * Array keys to be used with all commands
	 */
	public const KEY_CONTACT_DISCLOSURE = 'contact_disclosure';
	public const KEY_CONTACT_ID = 'contact_id';
	public const KEY_CONTACT_INFORMATION = 'contact_information';
	public const KEY_CONTACTS = 'contacts';
	public const KEY_CURRENT_EXPIRATION_YEAR = 'current_expiration_year';
	public const KEY_DOMAIN = 'domain';
	public const KEY_DOMAINS = 'domains';
	public const KEY_EVENT_ID = 'event_id';
	public const KEY_EXACT_MATCH = 'exact_match';
	public const KEY_FEE_AMOUNT = 'fee_amount';
	public const KEY_LIMIT = 'limit';
	public const KEY_NAMESERVERS = 'nameservers';
	public const KEY_PERIOD = 'period';
	public const KEY_PRIVACY_SETTINGS = 'privacy_setting';
	public const KEY_QUANTITY = 'quantity';
	public const KEY_QUERY = 'query';
	public const KEY_RECORD_SETS = 'record_sets';
	public const KEY_RECORDS = 'dns_records';
	public const KEY_TLDS = 'tlds';
	public const KEY_TRANSFERLOCK = 'transferlock';
	public const KEY_TRANSFERLOCK_OPT_OUT = 'transferlock_opt_out';

	/**
	 * Returns the command name that can be used to build command data
	 *
	 * @internal
	 *
	 * @return string
	 */
	public static function get_name(): string;

	/**
	 * Gets the client transaction ID
	 *
	 * @internal
	 *
	 * @return string
	 */
	public function get_client_txn_id(): string;

	/**
	 * Sets the client transaction ID
	 *
	 * @internal
	 *
	 * @param string $client_txn_id
	 * @return void
	 */
	public function set_client_txn_id( string $client_txn_id ): void;
}
