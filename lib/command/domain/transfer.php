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

namespace Automattic\Domain_Services_Client\Command\Domain;

use Automattic\Domain_Services_Client\{Command, Entity};

/**
 * Transfer in a domain.
 *
 * - This command transfer in a domain registered with a different registrar.
 * - The domain must be unlocked and have the correct auth code.
 * - The domain must not be within 60 days of the registration date or a previous transfer.
 * - The domain must not be within 60 days of a previous transfer.
 * - The domain must not be premium.
 * - The tld should be supported.
 * - The actual restore is processed asynchronously on the server. The result of the actual transfer operation will be
 *   returned in an event.
 *
 * Example usage:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example.com' );
 * $command = new Command\Domain\Transfer( $domain_name );
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *        // The transfer request was successfully queued.
 * }
 * ```
 *
 * @see \Automattic\Domain_Services_Client\Event\Domain\Transfer\Fail
 * @see \Automattic\Domain_Services_Client\Event\Domain\Transfer\Success
 * @see \Automattic\Domain_Services_Client\Response\Transfer
 */
class Transfer implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * The domain to transfer in
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The contact information to use when transferring the domain.
	 *
	 * @var Entity\Domain_Contacts
	 */
	private Entity\Domain_Contacts $contacts;

	/**
	 * The nameservers to set for the domain once it is transferred.
	 * (Optional, defaults to WordPress.com name servers.)
	 *
	 * @var Entity\Nameservers
	 */
	private Entity\Nameservers $nameservers;

	/**
	 * The DNS records to set for this domain, if using WordPress.com nameservers.
	 * (Optional, defaults to no records.)
	 *
	 * @var Entity\Dns_Records
	 */
	private ?Entity\Dns_Records $dns_records;

	public function __construct( Entity\Domain_Name $domain, string $auth_code, Entity\Domain_Contacts $contacts, Entity\Nameservers $nameservers = null, Entity\Dns_Records $dns_records = null ) {
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
		$this->nameservers = $nameservers;
		$this->auth_code = $auth_code;
		$this->dns_records = $dns_records;
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
	 * @return Entity\Nameservers
	 */
	public function get_nameservers(): Entity\Nameservers {
		return $this->nameservers;
	}

	/**
	 * @return string
	 */
	public function get_auth_code(): string {
		return $this->auth_code;
	}

	/**
	 * @return ?Entity\Dns_Records
	 */
	public function get_dns_records(): ?Entity\Dns_Records {
		return $this->dns_records;
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
			Command\Command_Interface::KEY_NAMESERVERS => $this->get_nameservers()->to_array(),
			Command\Command_Interface::KEY_RECORDS => $this->get_dns_records() ? $this->get_dns_records()->to_array() : null,
			Command\Command_Interface::KEY_AUTH_CODE => $this->get_auth_code(),
		];
	}
}
