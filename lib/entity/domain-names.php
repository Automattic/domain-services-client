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

namespace Automattic\Domain_Services\Entity;

class Domain_Names {
	/**
	 * The list of domain names.
	 *
	 * @var Domain_Name[]
	 */
	private array $domain_names;

	public function __construct( Domain_Name ...$domain_names ) {
		$this->domain_names = $domain_names;
	}

	/**
	 * @param Domain_name $domain_name
	 * @return $this
	 */
	public function add_domain_name( Domain_name $domain_name ): self {
		$this->domain_names[] = $domain_name;

		return $this;
	}

	/**
	 * @return Domain_Name[]
	 */
	public function get_domain_names(): array {
		return $this->domain_names;
	}

	public function to_array(): array {
		return array_map(
			static fn( $domain_name ) => $domain_name->get_name(),
			$this->get_domain_names()
		);
	}
}
