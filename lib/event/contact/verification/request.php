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

namespace Automattic\Domain_Services\Event\Contact\Verification;

use Automattic\Domain_Services\{Event};

/**
 * Verification request event
 *
 * This event indicates that a verification request was sent to the contact's email address.
 */
class Request implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Contact_Trait;

	/**
	 * Returns the email address that the verification request was sent to
	 *
	 * @return string|null
	 */
	public function get_email(): ?string {
		return $this->get_data_by_key( 'event_data.email' );
	}
}
