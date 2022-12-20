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

namespace Automattic\Domain_Services\Command\Contact;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Retrieves the details of a Contact_Id.
 */
class Details implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Contact_Id_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * The contact ID to get details of.
	 *
	 * @var Entity\Contact_Id
	 */
	private Entity\Contact_Id $contact_id;

	/**
	 * @param Entity\Contact_Id $contact_id
	 */
	public function __construct( Entity\Contact_Id $contact_id ) {
		$this->contact_id = $contact_id;
	}

	/**
	 * @return Entity\Contact_Id
	 */
	public function get_contact_id(): Entity\Contact_Id {
		return $this->contact_id;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Contact_Details';
	}

	public function to_array(): array {
		return [
			self::get_contact_id_array_key() => (string) $this->get_contact_id(),
		];
	}
}
