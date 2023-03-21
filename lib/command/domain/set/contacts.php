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

namespace Automattic\Domain_Services_Client\Command\Domain\Set;

use Automattic\Domain_Services_Client\{Command, Entity, Exception};

/**
 * Updates domain contacts
 *
 * - This command updates any or all of a domain's contacts.
 * - Contact types not included in the request would not be updated, but won't be deleted.
 * - For each contact type, either a contact ID or the full contact information can be provided.
 * - If contact information is provided, a new contact will be created and the contact ID will be returned.
 * - A domain has four contact types: owner, admin, tech and billing
 * - The `transfer_lock` property determines whether the domain's transfer lock will be set when the command updates the contact information. By default, it's set to true: the domain's transfer lock will be set, which prevents transfers until the end of the lock period - specific to the TLD of the domain. When false, no lock will be set.
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
 *     // The update request was successfully processed
 * }
 * ```
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Set\Contacts
 * @see Entity\Contact_Id
 * @see Entity\Contact_Information
 * @see Entity\Domain_Contacts
 * @see Entity\Domain_Contact
 */
class Contacts implements Command\Command_Interface, Command\Command_Serialize_Interface {
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
	 * Whether the command should set the transfer lock after updating the contact information.
	 *
	 * @var boolean
	 */
	private bool $transfer_lock;

	/**
	 * Constructs a `Domain\Set\Contacts` command
	 *
	 * @param Entity\Domain_Name     $domain
	 * @param Entity\Domain_Contacts $contacts
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( Entity\Domain_Name $domain, Entity\Domain_Contacts $contacts, bool $transfer_lock = true ) {
		$this->domain = $domain;

		if ( $contacts->is_empty() ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must provide at least one contact type for update.' );
		}

		$this->contacts = $contacts;
		$this->transfer_lock = $transfer_lock;
	}

	/**
	 * Gets the domain name that will be updated
	 *
	 * @return Entity\Domain_Name
	 */
	private function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * Gets the contact information that will be updated in the domain
	 *
	 * @return Entity\Domain_Contacts
	 */
	private function get_contacts(): Entity\Domain_Contacts {
		return $this->contacts;
	}

	/**
	 * Gets whether this command should set the transfer lock when updating the contact information.
	 *
	 * @return bool
	 */
	public function get_transfer_lock(): bool {
		return $this->transfer_lock;
	}

	/**
	 * Converts the command to an associative array
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_DOMAIN => $this->get_domain()->get_name(),
			Command\Command_Interface::KEY_CONTACTS => $this->get_contacts()->to_array(),
			Command\Command_Interface::KEY_TRANSFERLOCK => $this->get_transfer_lock(),
		];
	}
}
