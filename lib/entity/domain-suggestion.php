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

namespace Automattic\Domain_Services_Client\Entity;

/**
 * Domain name suggestion
 *
 * Used in the `Domain\Suggestions` response.
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Suggestions
 */
class Suggestion {
	/**
	 * @var Domain_Name a domain name suggestion
	 */
	private Domain_Name $domain_name;

	/**
	 * @var int fee the reseller must pay to register this domain
	 */
	private int $reseller_register_fee;

	/**
	 * @var int fee the reseller must pay to renew this domain
	 */
	private int $reseller_renewal_fee;

	/**
	 * @var bool is the suggestion available?
	 */
	private bool $is_available;

	/**
	 * @var bool is the suggestion a premium domain?
	 */
	private bool $is_premium;

	/**
	 * Constructs a `Suggestion` entity
	 *
	 * @param Domain_Name $domain_name
	 */
	public function __construct( Domain_Name $domain_name, int $reseller_create_fee = 0, int $reseller_renewal_fee = 0, bool $is_premium = false, bool $is_available = true ) {
		$this->domain_name = $domain_name;
		$this->reseller_register_fee = $reseller_create_fee;
		$this->reseller_renewal_fee = $reseller_renewal_fee;
		$this->is_premium = $is_premium;
		$this->is_available = $is_available;
	}

	/**
	 * Returns the domain name suggestion
	 *
	 * @return Domain_Name
	 */
	public function get_domain_name(): Domain_Name {
		return $this->domain_name;
	}

	/**
	 * Returns the reseller fee to register this domain
	 *
	 * @return int
	 */
	public function get_reseller_register_fee(): int {
		return $this->reseller_register_fee;
	}

	/**
	 * Returns the reseller fee to renew this domain
	 *
	 * @return int
	 */
	public function get_reseller_renewal_fee(): int {
		return $this->reseller_renewal_fee;
	}

	/**
	 * Returns whether the domain suggestion is available
	 *
	 * @return bool
	 */
	public function is_available(): bool {
		return $this->is_available;
	}

	/**
	 * Returns whether the domain suggestion is premium
	 *
	 * @return bool
	 */
	public function is_premium(): bool {
		return $this->is_premium;
	}

	/**
	 * Returns an associative array containing the domain name suggestion and its related properties
	 *
	 * @return array
	 * @internal
	 */
	public function to_array(): array {
		return [
			'name' => $this->domain_name->get_name(),
			'reseller_register_fee' => $this->get_reseller_register_fee(),
			'reseller_renewal_fee' => $this->get_reseller_renewal_fee(),
			'is_premium' => $this->is_premium(),
			'is_available' => $this->is_available(),
		];
	}
}
