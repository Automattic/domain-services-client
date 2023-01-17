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

namespace Automattic\Domain_Services_Client\Event;

use Automattic\Domain_Services_Client\{Entity};

/**
 * Trait for objects that are associated with a contact.
 * This trait relies on the `get_object_id()` method to be defined in the class that uses it.
 */
trait Object_Type_Contact_Trait {
	/**
	 * Returns the contact object.
	 * @return \Automattic\Domain_Services\Entity\Contact_Id
	 * @throws \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception
	 */
	final public function get_contact_id(): Entity\Contact_Id {
		return new Entity\Contact_Id( $this->get_object_id() );
	}
}
