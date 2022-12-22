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

namespace Automattic\Domain_Services\Command\Domain\Contacts;

use Automattic\Domain_Services\{Command, Entity, Exception};

/**
 * Updates domain contacts
 *
 * - This command updates any or all of domain contacts.
 * - Contact types not included in the request would not be updated, but won't be deleted.
 * - For each contact type, either a contact ID or the full contact information can be provided.
 * - If contact information is provided, a new contact will be created and the contact ID will be returned.
 * - This command runs asynchoronously.
 *
 * @see \Automattic\Domain_Services\Response\Domain\Contacts\Set
 * @see Entity\Domain_Contacts
 * @see Entity\Domain_Contact
 * @see Entity\Contact_Information
 * @see Entity\Contact_Id
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Contacts_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The contact information that will be updated in the domain.
	 * Only the provided contact types will be updated. If a contact type is not provided, it won't be deleted.
	 *
	 * @var Entity\Domain_Contacts
	 */
	private Entity\Domain_Contacts $contacts;

	/**
	 * @param Entity\Domain_Name $domain
	 * @param Entity\Domain_Contacts $contacts
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( Entity\Domain_Name $domain, Entity\Domain_Contacts $contacts ) {
		$this->domain = $domain;

		if ( $contacts->is_empty() ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must provide at least one contact type for update.' );
		}

		$this->contacts = $contacts;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Entity\Domain_Contacts
	 */
	public function get_contacts(): Entity\Domain_Contacts {
		return $this->contacts;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function get_name(): string {
		return 'Domain_Contacts_Set';
	}

	/**
	 * {@inheritDoc}
	 */
	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_contacts_array_key() => $this->get_contacts()->to_array(),
		];
	}
}
