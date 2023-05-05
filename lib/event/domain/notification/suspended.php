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

namespace Automattic\Domain_Services_Client\Event\Domain\Notification;

use Automattic\Domain_Services_Client\{Event};

/**
 * Domain suspended event
 *
 * - This event is generated when a domain is suspended
 * - One frequent cause for suspension is the contact info email not being verified some time after registration
 * - This event contains an `info` property with information about the reason why the domain was suspended, if available
 *     - It can be retrieved with the `get_info` method
 *
 * @see \Automattic\Domain_Services_Client\Event\Domain\Notification\Unsupended
 * @see \Automattic\Domain_Services_Client\Event\Domain\Notification\Verification_Success
 */
class Suspended implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Object_Type_Domain_Trait;

	/**
	 * Returns information about the reason the domain is suspended, if available.
	 *
	 * @return string|null
	 */
	public function get_info(): ?string {
		return $this->get_data_by_key( 'event_data.info' );
	}
}
