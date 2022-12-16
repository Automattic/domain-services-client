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
 * The contact information for domain registrants.
 */
class Contact_Information {
	private const FIRST_NAME = 'first_name';
	private const LAST_NAME = 'last_name';
	private const ORGANIZATION = 'organization';
	private const ADDRESS_1 = 'address_1';
	private const ADDRESS_2 = 'address_2';
	private const POSTAL_CODE = 'postal_code';
	private const CITY = 'city';
	private const STATE = 'state';
	private const COUNTRY_CODE = 'country_code';
	private const EMAIL = 'email';
	private const PHONE = 'phone';
	private const FAX = 'fax';

	private const VALID_CONTACT_INFORMATION_KEY = [
		self::FIRST_NAME,
		self::LAST_NAME,
		self::ORGANIZATION,
		self::ADDRESS_1,
		self::ADDRESS_2,
		self::POSTAL_CODE,
		self::CITY,
		self::STATE,
		self::COUNTRY_CODE,
		self::EMAIL,
		self::PHONE,
		self::FAX,
	];

	/**
	 * The list of all the contact information data.
	 *
	 * @var string[]
	 */
	private array $contact_information = [];

	/**
	 * @param string|null $first_name
	 * @param string|null $last_name
	 * @param string|null $organization
	 * @param string|null $address_1
	 * @param string|null $address_2
	 * @param string|null $postal_code
	 * @param string|null $city
	 * @param string|null $state
	 * @param string|null $country_code
	 * @param string|null $email
	 * @param string|null $phone
	 * @param string|null $fax
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( ?string $first_name = null, ?string $last_name = null, ?string $organization = null, ?string $address_1 = null, ?string $address_2 = null, ?string $postal_code = null, ?string $city = null, ?string $state = null, ?string $country_code = null, ?string $email = null, ?string $phone = null, ?string $fax = null ) {
		// TODO: Validate all of the data

		$this->set_by_key( self::FIRST_NAME, $first_name )
			->set_by_key( self::LAST_NAME, $last_name )
			->set_by_key( self::ORGANIZATION, $organization )
			->set_by_key( self::ADDRESS_1, $address_1 )
			->set_by_key( self::ADDRESS_2, $address_2 )
			->set_by_key( self::POSTAL_CODE, $postal_code )
			->set_by_key( self::CITY, $city )
			->set_by_key( self::STATE, $state )
			->set_by_key( self::COUNTRY_CODE, $country_code )
			->set_by_key( self::EMAIL, $email )
			->set_by_key( self::PHONE, $phone )
			->set_by_key( self::FAX, $fax );
	}

	/**
	 * Set a contact data value with a given key.
	 *
	 * @param string      $key
	 * @param string|null $contact_item_value
	 * @return Contact_Information
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function set_by_key( string $key, ?string $contact_item_value ): self {
		if ( ! in_array( $key, self::VALID_CONTACT_INFORMATION_KEY, true ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid contact key' );
		}

		$this->contact_information[ $key ] = $contact_item_value;

		return $this;
	}

	/**
	 * Get the contact data value fot the given key
	 *
	 * @param string $key
	 * @return string|null
	 */
	public function get_by_key( string $key ): ?string {
		return $this->contact_information[ $key ] ?? null;
	}

	/**
	 * @return string[]
	 */
	public function to_array(): array {
		return $this->contact_information;
	}

	/**
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public static function from_array( array $data ): self {
		$contact_information = new self();

		$contact_information->set_by_key( self::FIRST_NAME, $data[ self::FIRST_NAME ] )
			->set_by_key( self::LAST_NAME, $data[ self::LAST_NAME ] )
			->set_by_key( self::ORGANIZATION, $data[ self::ORGANIZATION ] )
			->set_by_key( self::ADDRESS_1, $data[ self::ADDRESS_1 ] )
			->set_by_key( self::ADDRESS_2, $data[ self::ADDRESS_2 ] )
			->set_by_key( self::POSTAL_CODE, $data[ self::POSTAL_CODE ] )
			->set_by_key( self::CITY, $data[ self::CITY ] )
			->set_by_key( self::STATE, $data[ self::STATE ] )
			->set_by_key( self::COUNTRY_CODE, $data[ self::COUNTRY_CODE ] )
			->set_by_key( self::EMAIL, $data[ self::EMAIL ] )
			->set_by_key( self::PHONE, $data[ self::PHONE ] )
			->set_by_key( self::FAX, $data[ self::FAX ] );

		return $contact_information;
	}

	/**
	 * @return string|null
	 */
	public function get_first_name(): ?string {
		return $this->get_by_key( self::FIRST_NAME );
	}

	/**
	 * @return string|null
	 */
	public function get_last_name(): ?string {
		return $this->get_by_key( self::LAST_NAME );
	}

	/**
	 * @return string|null
	 */
	public function get_organization(): ?string {
		return $this->get_by_key( self::ORGANIZATION );
	}

	/**
	 * @return string|null
	 */
	public function get_address_1(): ?string {
		return $this->get_by_key( self::ADDRESS_1 );
	}

	/**
	 * @return string|null
	 */
	public function get_address_2(): ?string {
		return $this->get_by_key( self::ADDRESS_2 );
	}

	/**
	 * @return string|null
	 */
	public function get_postal_code(): ?string {
		return $this->get_by_key( self::POSTAL_CODE );
	}

	/**
	 * @return string|null
	 */
	public function get_city(): ?string {
		return $this->get_by_key( self::CITY );
	}

	/**
	 * @return string|null
	 */
	public function get_state(): ?string {
		return $this->get_by_key( self::STATE );
	}

	/**
	 * @return string|null
	 */
	public function get_country_code(): ?string {
		return $this->get_by_key( self::COUNTRY_CODE );
	}

	/**
	 * @return string|null
	 */
	public function get_email(): ?string {
		return $this->get_by_key( self::EMAIL );
	}

	/**
	 * @return string|null
	 */
	public function get_phone(): ?string {
		return $this->get_by_key( self::PHONE );
	}

	/**
	 * @return string|null
	 */
	public function get_fax(): ?string {
		return $this->get_by_key( self::FAX );
	}
}
