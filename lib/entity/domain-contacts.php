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

use Automattic\Domain_Services\{Exception};

/**
 * Represents all contact types for a domain name
 *
 * @see Domain_Contact
 */
class Domain_Contacts implements \Iterator {
	public const OWNER = 'owner';
	public const ADMIN = 'admin';
	public const TECH = 'tech';
	public const BILLING = 'billing';

	private const ITERATOR_KEYS = [
		self::OWNER,
		self::ADMIN,
		self::TECH,
		self::BILLING,
	];

	/**
	 * The list of domain contacts
	 *
	 * @var Domain_Contact[]
	 */
	private array $domain_contacts = [];

	/**
	 * The current index for the iterator
	 *
	 * @var int
	 */
	private int $iterator_pointer = 0;

	/**
	 * @param Domain_Contact|null $owner
	 * @param Domain_Contact|null $admin
	 * @param Domain_Contact|null $tech
	 * @param Domain_Contact|null $billing
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( ?Domain_Contact $owner = null, ?Domain_Contact $admin = null, ?Domain_Contact $tech = null, ?Domain_Contact $billing = null ) {
		if ( null !== $owner ) {
			$this->set_by_key( self::OWNER, $owner );
		}

		if ( null !== $admin ) {
			$this->set_by_key( self::ADMIN, $admin );
		}

		if ( null !== $tech ) {
			$this->set_by_key( self::TECH, $tech );
		}

		if ( null !== $billing ) {
			$this->set_by_key( self::BILLING, $billing );
		}
	}

	public function is_empty(): bool {
		return empty( $this->domain_contacts );
	}

	/**
	 * Returns an array of contact IDs that can be returned with the DSAPI response data.
	 *
	 * @return string[]
	 */
	public function to_array(): array {
		$result = [];

		foreach ( $this->domain_contacts as $type => $contact ) {
			$result[ $type ] = $contact->to_array();
		}

		return $result;
	}

	/**
	 * Builds an instance from an array
	 *
	 * - The $data array is expected to have the contact type as key and an array as a value.
	 * - The array can either have a `contact_id` or a `contact_information` key with the corresponding data.
	 * - There is also an optional `contact_disclosure` that can be passed for each contact.
	 *
	 * @param array $data
	 *
	 * @return static
	 * @throws Exception\Entity\Invalid_Value_Exception
	 *
	 * @see Domain_Contact
	 */
	public static function from_array( array $data ): self {
		$domain_contacts = new self();

		foreach ( self::ITERATOR_KEYS as $contact_type ) {
			if ( null !== ( $data[ $contact_type ] ?? null ) ) {
				$domain_contact = Domain_Contact::from_array( $data[ $contact_type ] );
				$domain_contacts->set_by_key( $contact_type, $domain_contact );
			}
		}

		return $domain_contacts;
	}

	/**
	 * Sets domain contact by type
	 *
	 * @param string         $key
	 * @param Domain_Contact $domain_contact
	 *
	 * @return void
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function set_by_key( string $key, Domain_Contact $domain_contact ): void {
		if ( ! in_array( $key, self::ITERATOR_KEYS ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid domain contact type' );
		}

		$this->domain_contacts[ $key ] = $domain_contact;
	}

	/**
	 * Gets domain contact by type
	 *
	 * @param string $key
	 *
	 * @return Domain_Contact|null
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_by_key( string $key ): ?Domain_Contact {
		if ( ! in_array( $key, self::ITERATOR_KEYS ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid domain contact type' );
		}

		return $this->domain_contacts[ $key ] ?? null;
	}

	/**
	 * Returns a list of the valid contact types
	 *
	 * @return string[]
	 */
	public static function get_valid_contact_types(): array {
		return self::ITERATOR_KEYS;
	}

	/**
	 * Gets the domain owner's contact
	 *
	 * @return Domain_Contact|null
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_owner(): ?Domain_Contact {
		return $this->get_by_key( self::OWNER );
	}

	/**
	 * Sets the domain owner's contact
	 *
	 * @param Domain_Contact $owner
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function set_owner( Domain_Contact $owner ): void {
		$this->set_by_key( self::OWNER, $owner );
	}

	/**
	 * Gets the domain admin's contact
	 *
	 * @return Domain_Contact|null
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_admin(): ?Domain_Contact {
		return $this->get_by_key( self::ADMIN );
	}

	/**
	 * Sets the domain admin's contact
	 *
	 * @param Domain_Contact|null $admin
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function set_admin( Domain_Contact $admin ): void {
		$this->set_by_key( self::ADMIN, $admin );
	}

	/**
	 * Gets the domain tech's contact
	 *
	 * @return Domain_Contact|null
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_tech(): ?Domain_Contact {
		return $this->get_by_key( self::TECH );
	}

	/**
	 * Sets the domain tech's contact
	 *
	 * @param Domain_Contact|null $tech
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function set_tech( Domain_Contact $tech ): void {
		$this->set_by_key( self::TECH, $tech );
	}

	/**
	 * Gets the domain billing's contact
	 *
	 * @return Domain_Contact|null
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_billing(): ?Domain_Contact {
		return $this->get_by_key( self::BILLING );
	}

	/**
	 * Sets the domain billing's contact
	 *
	 * @param Domain_Contact|null $billing
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function set_billing( Domain_Contact $billing ): void {
		$this->set_by_key( self::BILLING, $billing );
	}

	/**
	 * Functions to implement the Iterator interface
	 */
	public function current(): ?Domain_Contact {
		return $this->get_by_key( self::ITERATOR_KEYS[ $this->iterator_pointer ] );
	}

	public function next(): void {
		$this->iterator_pointer ++;
	}

	public function key(): ?string {
		return self::ITERATOR_KEYS[ $this->iterator_pointer ];
	}

	public function valid(): bool {
		return isset( self::ITERATOR_KEYS[ $this->iterator_pointer ] );
	}

	public function rewind(): void {
		$this->iterator_pointer = 0;
	}
}
