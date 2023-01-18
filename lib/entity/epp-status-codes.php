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

/**
 * List of `Epp_Status_Code` entities
 *
 * @see \Automattic\Domain_Services\Entity\Epp_Status_Code
 */
class Epp_Status_Codes implements \Iterator {
	/**
	 * The list of EPP status codes that apply to a single domain
	 *
	 * @var Epp_Status_Code[]
	 */
	private array $epp_status_codes = [];

	/**
	 * The current index for the iterator
	 *
	 * @var int
	 */
	private int $iterator_pointer = 0;

	/**
	 * Constructs an `Epp_Status_Codes` entity
	 *
	 * @param \Automattic\Domain_Services\Entity\Epp_Status_Code ...$epp_status_codes
	 */
	public function __construct( Epp_Status_Code ...$epp_status_codes ) {
		foreach ( $epp_status_codes as $epp_status_code ) {
			$this->add_epp_code( $epp_status_code );
		}
	}

	/**
	 * Add an EPP status code to the current object
	 *
	 * @param Epp_Status_Code $epp_status_code
	 *
	 * @return void
	 */
	public function add_epp_code( Epp_Status_Code $epp_status_code ): void {
		// @todo where are we checking whether the EPP status is updateable or not
		$this->epp_status_codes[ (string) $epp_status_code ] = $epp_status_code;
	}

	/**
	 * Returns the list of EPP status codes as an array of strings
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function to_array(): array {
		$epp_status_codes = [];

		foreach ( $this->epp_status_codes as $epp_status_code ) {
			$epp_status_codes[] = (string) $epp_status_code;
		}

		return $epp_status_codes;
	}

	/**
	 * Part of the iterator interface implementation
	 *
	 * @internal
	 *
	 * @return Epp_Status_Code|null
	 */
	public function current(): ?Epp_Status_Code {
		$keys = array_keys( $this->epp_status_codes );
		return $this->epp_status_codes[ $keys[ $this->iterator_pointer ] ];
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
		return $this->iterator_pointer < count( $this->epp_status_codes );
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
