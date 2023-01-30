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
	 * Constructs a Suggestion entity
	 *
	 * @param Domain_Name $domain_name
	 */
	public function __construct( Domain_Name $domain_name ) {
		$this->domain_name = $domain_name;
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
	 * Returns an associative array containing the domain name suggestion
	 *
	 * @internal
	 * @return array
	 */
	public function to_array(): array {
		return [
			'name' => $this->domain_name->get_name(),
		];
	}
}
