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
 * An interface used by all event classes.
 */
interface Event_Interface {

	public const KEY_ID = 'id';
	public const KEY_OBJECT_ID = 'object_id';
	public const KEY_OBJECT_TYPE = 'object_type';
	public const KEY_EVENT_DATE = 'event_date';
	public const KEY_ACKNOWLEDGED_DATE = 'acknowledged_date';
	public const KEY_EVENT_CLASS = 'event_class';
	public const KEY_EVENT_SUBCLASS = 'event_subclass';
	public const KEY_EVENT_ERRORS = 'event_data.errors';
	public const KEY_COMMAND_STATUS = 'event_data.status';
	public const KEY_COMMAND_STATUS_DESCRIPTION = 'event_data.status_description';
	public const KEY_COMMAND_CLIENT_TXN_ID = 'event_data.client_txn_id';
	public const KEY_COMMAND_SERVER_TXN_ID = 'event_data.server_txn_id';

	/**
	 * Gets the value of the event data specified by the given key.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function get_data_by_key( string $key );

	/**
	 * Gets the event ID
	 *
	 * @return int
	 */
	public function get_id(): int;

	/**
	 * Gets the event class
	 *
	 * @return string
	 */
	public function get_event_class(): string;

	/**
	 * Gets the event subclass
	 *
	 * @return string
	 */
	public function get_event_subclass(): string;

	/**
	 * Gets the type of object that this event references (ex. 'domain' or 'contact')
	 *
	 * @return string
	 */
	public function get_object_type(): string;

	/**
	 * Gets the ID of the object that this event references.
	 * - The contact ID for a contact object type
	 * - The domain name for a domain object type
	 *
	 * @return string
	 */
	public function get_object_id(): string;

	/**
	 * Gets the date this event was generated.
	 *
	 * @return \DateTimeInterface
	 */
	public function get_event_date(): \DateTimeInterface;

	/**
	 * Gets the date this event was acknowledged.
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_acknowledged_date(): ?\DateTimeInterface;
}
