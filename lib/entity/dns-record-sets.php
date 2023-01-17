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

namespace Automattic\Domain_Services_Client\Entity;

use Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception;

/**
 * Set of sets of DNS records
 *
 * @see \Automattic\Domain_Services_Client\Entity\Dns_Record_Set
 */
class Dns_Record_Sets implements \Iterator {
	/**
	 * The list of EPP status codes that apply to a single domain
	 *
	 * @var Dns_Record_Set[]
	 */
	private array $dns_record_sets = [];

	/**
	 * The current index for the iterator
	 *
	 * @var int
	 */
	private int $iterator_pointer = 0;

	/**
	 * Constructs a Dns_Record_Sets entity
	 *
	 * @param Dns_Record_Set ...$dns_record_sets
	 */
	public function __construct( Dns_Record_Set ...$dns_record_sets ) {
		foreach ( $dns_record_sets as $dns_record_set ) {
			$this->add_record_set( $dns_record_set );
		}
	}

	/**
	 * Adds a Dns_Record_Set to this entity
	 *
	 * @param Dns_Record_Set $dns_record_set
	 * @return void
	 */
	public function add_record_set( Dns_Record_Set $dns_record_set ): void {
		// @todo check for duplicates before adding new records?
		$this->dns_record_sets[] = $dns_record_set;
	}

	/**
	 * Returns each Dns_Record_Set in this entity as an array
	 *
	 * @internal
	 * @return array
	 */
	public function to_array(): array {
		$dns_record_sets = [];

		foreach ( $this->dns_record_sets as $dns_record_set ) {
			$dns_record_sets[] = $dns_record_set->to_array();
		}

		return $dns_record_sets;
	}

	/**
	 * Constructs a DNS_Record_Sets entity from an array of DNS record set values
	 *
	 * @param array $dns_record_sets_data
	 * @return static
	 * @throws Invalid_Value_Exception
	 *
	 * @internal
	 * @see \Automattic\Domain_Services_Client\Entity\Dns_Record_Set
	 */
	public static function from_array( array $dns_record_sets_data ): self {
		$dns_record_sets = new self();

		foreach ( $dns_record_sets_data as $dns_record_set_data ) {
			$dns_record_set = Dns_Record_Set::from_array( $dns_record_set_data );
			$dns_record_sets->add_record_set( $dns_record_set );
		}

		return $dns_record_sets;
	}

	/**
	 * Part of the iterator interface implementation
	 *
	 * @internal
	 *
	 * @return Dns_Record_Set|null
	 */
	public function current(): ?Dns_Record_Set {
		$keys = array_keys( $this->dns_record_sets );
		return $this->dns_record_sets[ $keys[ $this->iterator_pointer ] ];
	}

	/**
	 * Part of the iterator interface implementation
	 *
	 * @internal
	 *
	 * @return void
	 */
	public function next(): void {
		$this->iterator_pointer++;
	}

	/**
	 * Part of the iterator interface implementation
	 *
	 * @internal
	 *
	 * @return int|null
	 */
	public function key(): ?int {
		return $this->iterator_pointer;
	}

	/**
	 * Part of the iterator interface implementation
	 *
	 * @internal
	 *
	 * @return bool
	 */
	public function valid(): bool {
		return $this->iterator_pointer < count( $this->dns_record_sets );
	}

	/**
	 * Part of the iterator interface implementation
	 *
	 * @internal
	 *
	 * @return void
	 */
	public function rewind(): void {
		$this->iterator_pointer = 0;
	}
}
