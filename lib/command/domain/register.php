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

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity, Exception};

/**
 * Register a new a domain.
 *
 * - This command requests a new domain registration
 * - It runs asynchronously on the server
 * - Reseller will receive a Domain\Register\Success or Domain\Register\Fail event depending on the result of the command
 *
 * Example usage:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example.com' );
 * $contact_info = [
 *   'first_name' => 'John',
 *   'last_name' => 'Doe',
 *   'organization' => '',
 *   'address_1' => '60 29th Street #343',
 *   'address_2' => '',
 *   'postal_code' => '94110',
 *   'city' => 'San Francisco',
 *   'state' => 'CA',
 *   'country_code' => 'US',
 *   'email' => 'registrar@automattic.com',
 *   'phone' => '+1.8772733049',
 *   'fax' => null,
 * ];
 * $contacts = Entity\Domain_Contacts::from_array(
 *   [
 *     'owner' => [ 'contact_information' => $contact_info ],
 *     'admin' => [ 'contact_information' => $contact_info ],
 *   ]
 * );
 * $name_servers = new Entity\Nameservers(
 *   new Entity\Domain_Name( 'ns1.example.com' ),
 *   new Entity\Domain_Name( 'ns2.example.com' ),
 * );
 * $dns_records = new Entity\Dns_Records(
 *   $domain,
 *   new Entity\Dns_Record_Sets(
 *     new Entity\Dns_Record_Set(
 *       '@',
 *       new Entity\Dns_Record_Type( Entity\Dns_Record_Type::A ),
 *       3600,
 *       [
 *         '1.2.3.4',
 *         '5.6.7.8',
 *       ]
 *     )
 *   )
 * );
 * $command = new Command\Domain\Register( $domain_name, $contacts, 1, $name_servers, $dns_records, Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE, null );
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *   // The register request was successfully queued.
 * }
 * ```
 *
 * @package Automattic\Domain_Services\Command\Domain
 * @see     \Automattic\Domain_Services\Event\Domain\Register\Fail
 * @see     \Automattic\Domain_Services\Event\Domain\Register\Success
 * @see     \Automattic\Domain_Services\Response\Domain\Register
 */
class Register implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Contacts_Trait;

	/**
	 * The domain name to register
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The contact information to use when registering this domain.
	 *
	 * @var Entity\Domain_Contacts
	 */
	private Entity\Domain_Contacts $contacts;

	/**
	 * The number of years to register this domain for.
	 * (Optional, defaults to 1.)
	 *
	 * @var int
	 */
	private int $period;

	/**
	 * The nameservers to set for this domain once it is registered.
	 * (Optional, defaults to WordPress.com name servers.)
	 *
	 * @var Entity\Nameservers|null
	 */
	private Entity\Nameservers $nameservers;

	/**
	 * The DNS records to set for this domain, if using WordPress.com nameservers.
	 * (Optional, defaults to no records.)
	 *
	 * @var Entity\Dns_Records
	 */
	private ?Entity\Dns_Records $dns_records;

	/**
	 * The Whois privacy setting to use for this domain.
	 * (Optional, defaults to "a8c_privacy_service" which uses the Knock Knock Whois Not There privacy service.)
	 *
	 * @var string
	 */
	private string $privacy_setting;

	/**
	 * The price of the domain.
	 * (Only used when registering a premium domain. Defaults to null.)
	 *
	 * @var int|null
	 */
	private ?int $price;

	/**
	 * Constructs the Register command
	 *
	 * @param Domain_Name $domain
	 * @param Domain_Contacts $contacts
	 * @param int $period
	 * @param Nameservers|null $nameservers
	 * @param Dns_Records|null $dns_records
	 * @param string $privacy_setting
	 * @param null|int $price
	 * @throws Invalid_Value_Exception
	 */
	public function __construct( Entity\Domain_Name $domain, Entity\Domain_Contacts $contacts, int $period = 1, Entity\Nameservers $nameservers = null, Entity\Dns_Records $dns_records = null, string $privacy_setting = 'a8c_privacy_service', ?int $price = null ) {
		if ( null === $nameservers ) {
			$nameservers = new Entity\Nameservers(
				new Entity\Domain_Name( 'ns1.wordpress.com' ),
				new Entity\Domain_Name( 'ns2.wordpress.com' ),
				new Entity\Domain_Name( 'ns3.wordpress.com' ),
			);
		}

		$this->domain = $domain;
		if ( null === $contacts->get_owner() ) {
			throw new Exception\Entity\Invalid_Value_Exception( 'contacts', 'The owner contact information cannot be null.' );
		}
		$this->contacts = $contacts;
		$this->period = $period;
		$this->nameservers = $nameservers;
		$this->dns_records = $dns_records;
		$this->privacy_setting = $privacy_setting;
		$this->price = $price;
	}

	/**
	 * Gets the domain name to be registered
	 *
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * Gets the contacts to be created for the domain
	 *
	 * @return Entity\Domain_Contacts
	 */
	public function get_contacts(): Entity\Domain_Contacts {
		return $this->contacts;
	}

	/**
	 * Get the amount of years for which the domain is to be renewed.
	 * @return int
	 */
	public function get_period(): int {
		return $this->period;
	}

	/**
	 * Gets the contacts to be set for the domain
	 *
	 * @return Entity\Nameservers
	 */
	public function get_nameservers(): Entity\Nameservers {
		return $this->nameservers;
	}

	/**
	 * Gets the dns records to be set for the domain
	 * @return ?Entity\Dns_Records
	 */
	public function get_dns_records(): ?Entity\Dns_Records {
		return $this->dns_records;
	}

	/**
	 * Gets the Whois privacy setting to be used for this domain.
	 * @return string
	 */
	public function get_privacy_setting(): string {
		return $this->privacy_setting;
	}

	/**
	 * Gets the price for this domain.
	 *
	 * @return int|null
	 */
	public function get_price(): ?int {
		return $this->price;
	}

	/**
	 * {@inheritDoc}
	 */
	public static function get_name(): string {
		return 'Domain_Register';
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
