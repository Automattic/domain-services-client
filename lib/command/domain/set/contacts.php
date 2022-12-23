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

namespace Automattic\Domain_Services\Command\Domain\Set;

use Automattic\Domain_Services\{Command, Entity, Exception};

/**
 * Updates domain contacts
 *
 * - This command updates any or all of a domain's contacts.
 * - Contact types not included in the request would not be updated, but won't be deleted.
 * - For each contact type, either a contact ID or the full contact information can be provided.
 * - If contact information is provided, a new contact will be created and the contact ID will be returned.
 * - This command runs asynchronously on the server.
 * - Getting a success response means that the operation was queued successfully.
 * - A domain has four contact types: owner, admin, tech and billing
 *
 * ## Example:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example.com' );
 * $contact_id = new Entity\Contact_Id( 'SP1:5499554' );
 * $domain_contacts = new Entity\Domain_Contacts();
 *
 * $domain_contacts->set_owner( new Entity\Domain_Contact( $contact_id ) );
 * $domain_contacts->set_billing( new Entity\Domain_Contact( $contact_id ) );
 *
 * $command = new Command\Domain\Set\Contacts( $domain_name, $domain_contacts );
 *
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *     // The update request was queued successfully
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Response\Domain\Set\Contacts
 * @see Entity\Contact_Id
 * @see Entity\Contact_Information
 * @see Entity\Domain_Contacts
 * @see Entity\Domain_Contact
 */
class Contacts implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Array_Key_Contacts_Trait;
	use Command\Array_Key_Domain_Trait;
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

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
	 * Constructs a Domain\Set\Contacts command
	 *
	 * @param Entity\Domain_Name     $domain
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
		return 'Domain_Set_Contacts';
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
