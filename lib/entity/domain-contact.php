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

use Automattic\Domain_Services\{Command, Exception};

/**
 * Represents a domain contact
 *
 * Represents one of the domain's contacts and its privacy setting.
 */
class Domain_Contact {
	use Command\Array_Key_Contact_Id_Trait;
	use Command\Array_Key_Contact_Information_Trait;

	/**
	 * The contact ID
	 *
	 * @var Contact_Id|null
	 */
	private ?Contact_Id $contact_id;

	/**
	 * The contact information
	 *
	 * @var Contact_Information|null
	 */
	private ?Contact_Information $contact_information;

	/**
	 * Which fields to disclose in Whois results
	 *
	 * @var Contact_Disclosure
	 */
	private Contact_Disclosure $contact_disclosure;

	public function __construct( ?Contact_Id $contact_id = null, ?Contact_Information $contact_info = null, ?Contact_Disclosure $disclose_fields = null ) {
		$this->contact_id = $contact_id;
		$this->contact_information = $contact_info;

		if ( null === $disclose_fields ) {
			$disclose_fields = new Contact_Disclosure( Contact_Disclosure::NONE );
		}
		$this->contact_disclosure = $disclose_fields;
	}

	/**
	 * Returns an array representation of this instance
	 *
	 * @return array
	 */
	public function to_array(): array {
		$contact_id = $this->get_contact_id();
		if ( null !== $contact_id ) {
			$contact_id = (string) $contact_id;
		}

		$contact_info = $this->get_contact_information();
		if ( null !== $contact_info ) {
			$contact_info = $contact_info->to_array();
		}

		return [
			self::get_contact_id_array_key() => $contact_id,
			self::get_contact_information_array_key() => $contact_info,
			Command\Array_Keys::CONTACT_DISCLOSURE => $this->get_contact_disclosure()->get_disclose_fields(),
		];
	}

	/**
	 * Builds an instance from an array
	 *
	 * The array can include `contact_id`, `contact_information`, and/or `contact_disclosure`
	 *
	 * @param array $data
	 *
	 * @return static
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public static function from_array( array $data ): self {
		$domain_contact = new Domain_Contact();

		if ( null !== ( $data[ self::get_contact_id_array_key() ] ?? null ) ) {
			$contact_id = new Contact_Id( $data[ self::get_contact_id_array_key() ] );
			$domain_contact->set_contact_id( $contact_id );
		}

		if ( null !== ( $data[ self::get_contact_information_array_key() ] ?? null ) ) {
			$contact_information = Contact_Information::from_array( $data[ self::get_contact_information_array_key() ] );
			$domain_contact->set_contact_information( $contact_information );
		}

		if ( null !== ( $data[ Command\Array_Keys::CONTACT_DISCLOSURE ] ?? null ) ) {
			$contact_disclosure = new Contact_Disclosure( $data[ Command\Array_Keys::CONTACT_DISCLOSURE ] );
			$domain_contact->set_contact_disclosure( $contact_disclosure );
		}

		return $domain_contact;
	}

	/**
	 * @return Contact_Id|null
	 */
	public function get_contact_id(): ?Contact_Id {
		return $this->contact_id;
	}

	/**
	 * @param Contact_Id|null $contact_id
	 */
	public function set_contact_id( Contact_Id $contact_id ): void {
		$this->contact_id = $contact_id;
	}

	/**
	 * @return Contact_Information|null
	 */
	public function get_contact_information(): ?Contact_Information {
		return $this->contact_information;
	}

	/**
	 * @param Contact_Information|null $contact_information
	 */
	public function set_contact_information( Contact_Information $contact_information ): void {
		$this->contact_information = $contact_information;
	}

	/**
	 * @return Contact_Disclosure
	 */
	public function get_contact_disclosure(): Contact_Disclosure {
		return $this->contact_disclosure;
	}

	/**
	 * @param Contact_Disclosure $contact_disclosure
	 */
	public function set_contact_disclosure( Contact_Disclosure $contact_disclosure ): void {
		$this->contact_disclosure = $contact_disclosure;
	}
}
