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

namespace Automattic\Domain_Services_Client\Response\Exception;

use Automattic\Domain_Services_Client\{Response};

/**
 * Response of a request that returned an error.
 */
class Error implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Returns the invalid option
	 *
	 * @return string|null
	 */
	public function get_invalid_option(): ?string {
		return $this->get_data_by_key( 'invalid_option' );
	}

	/**
	 * Returns the reason for the error
	 *
	 * @return string|null
	 */
	public function get_reason(): ?string {
		return $this->get_data_by_key( 'reason' );
	}

	/**
	 * Returns the command used
	 *
	 * @return string|null
	 */
	public function get_command(): ?string {
		return $this->get_data_by_key( 'command_data.command' );
	}

	/**
	 * Returns the command parameters used
	 *
	 * @return array|null
	 */
	public function get_command_params(): ?array {
		return $this->get_data_by_key( 'command_data.params' );
	}
}
