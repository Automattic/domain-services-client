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

namespace Automattic\Domain_Services_Client\Response\Domain;

use Automattic\Domain_Services_Client\Response;

/**
 * Response of a `Domain\Check` command
 *
 * @see \Automattic\Domain_Services\Command\Domain\Check
 */
class Check implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Gets the availability and pricing information for a list of domain from the response.
	 *
	 * ## Example of a returned array:
	 * ```
	 * [
	 *     'domain_name' => [
	 *         'available' => bool,
	 *         'fee_class' => 'standard',
	 *     ],
	 * ]
	 * ```
	 *
	 * @return array
	 */
	public function get_domains(): array {
		return $this->get_data_by_key( 'data.domains' ) ?? [];
	}
}
