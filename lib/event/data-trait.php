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

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\Helper;

/**
 * A trait that defines data access methods common to all event classes.
 */
trait Data_Trait {
	/**
	 * The raw event data received from the server.
	 *
	 * @var array
	 */
	private array $data;

	/**
	 * Constructs an event object
	 *
	 * @param array $data
	 */
	final public function __construct( array $data = [] ) {
		$this->data = $data;
	}

	/**
	 * Gets the value of the event data specified by the given key.
	 *
	 * @param string $key
	 * @return array|mixed|null
	 */
	final public function get_data_by_key( string $key ) {
		$key_parts = explode( '.', $key );
		$data = $this->data;
		foreach ( $key_parts as $key_part ) {
			$data = $data[ $key_part ] ?? null;
		}
		return $data;
	}

	/**
	 * Gets the event ID
	 *
	 * @return int
	 */
	public function get_id(): int {
		return $this->get_data_by_key( 'id' );
	}

	/**
	 * Gets the event class
	 *
	 * @return string
	 */
	public function get_event_class(): string {
		return $this->get_data_by_key( 'event_class' );
	}

	/**
	 * Gets the event subclass
	 *
	 * @return string
	 */
	public function get_event_subclass(): string {
		return $this->get_data_by_key( 'event_subclass' );
	}

	/**
	 * Gets the type of object that this event references (ex. 'domain' or 'contact')
	 *
	 * @return string
	 */
	public function get_object_type(): string {
		return $this->get_data_by_key( 'object_type' );
	}

	/**
	 * Gets the ID of the object that this event references.
	 * - The contact ID for a contact object type
	 * - The domain name for a domain object type
	 *
	 * @return string
	 */
	public function get_object_id(): string {
		return $this->get_data_by_key( 'object_id' );
	}

	/**
	 * Gets the date this event was generated.
	 *
	 * @return \DateTimeInterface
	 */
	public function get_event_date(): \DateTimeInterface {
		return Helper\Date_Time::createImmutable( $this->get_data_by_key( 'event_date' ) );
	}

	/**
	 * Gets the date this event was acknowledged.
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_acknowledged_date(): ?\DateTimeInterface {
		$acknowledged_date = $this->get_data_by_key( 'acknowledged_date' );
		if ( null === $acknowledged_date ) {
			return null;
		}

		return Helper\Date_Time::createImmutable( $this->get_data_by_key( 'acknowledged_date' ) );
	}

	/**
	 * Gets all the event data as an array
	 *
	 * @return array
	 * @throws \JsonException
	 */
	public function get_event_data(): array {
		return json_decode( $this->get_data_by_key( 'event_data' ), true, 512, JSON_THROW_ON_ERROR );
	}
}
