<?php declare( strict_types=1 );
/*
 * Copyright (c) 2023 Automattic, Inc.
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

namespace Automattic\Domain_Services_Client\Command\Domain;

use Automattic\Domain_Services_Client\{Command};

/**
 * Retrieves a list of domain name suggestions based on a query string
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Suggestions
 */
class Suggestions implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * @var string query string used to retrieve suggestions
	 */
	private string $query;

	/**
	 * @var int number of domain suggestions to retrieve
	 */
	private int $quantity;

	/**
	 * @var array|null list of TLDs that the retrieved suggestions should be limited to (optional, defaults to all available TLDs for the reseller)
	 */
	private ?array $tlds;

	/**
	 * @var bool whether the retrieved suggestions should be an exact match of the query string (optional, default to false)
	 */
	private bool $exact_match;

	/**
	 * Constructs a `Domain\Suggestions` command
	 *
	 * @param string $query
	 * @param int $quantity
	 * @param array|null $tlds
	 * @param bool $exact_match
	 */
	public function __construct( string $query, int $quantity, ?array $tlds = null, bool $exact_match = false ) {
		$this->query = $query;
		$this->quantity = $quantity;
		$this->tlds = $tlds;
		$this->exact_match = $exact_match;
	}

	/**
	 * Returns the query string used to get suggestions
	 *
	 * @return string
	 */
	private function get_query(): string {
		return $this->query;
	}

	/**
	 * Returns the quantity of suggestions to generate
	 *
	 * @return int
	 */
	private function get_quantity(): int {
		return $this->quantity;
	}

	/**
	 * Returns the list of TLDs that the retrieved suggestions should be limited to
	 *
	 * @return array|null
	 */
	public function get_tlds(): ?array {
		return $this->tlds ?? null;
	}

	/**
	 * Returns whether the retrieved suggestions should be an exact match of the query string
	 *
	 * @return bool
	 */
	public function is_exact_match(): bool {
		return $this->exact_match;
	}

	/**
	 * Converts the command to an associative array
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_QUERY => $this->query,
			Command\Command_Interface::KEY_QUANTITY => $this->quantity,
			Command\Command_Interface::KEY_TLDS => $this->tlds,
			Command\Command_Interface::KEY_EXACT_MATCH => $this->exact_match,
		];
	}
}
