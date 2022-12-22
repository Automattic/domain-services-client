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

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response of a `Domain\Info` command
 *
 * This is the response returned from a successful execution of the `Domain\Info` command. It includes all the current
 * attributes of the domain at the registry.
 */
class Info implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Gets the domain EPP auth code
	 *
	 * @return string
	 */
	public function get_auth_code(): string {
		return $this->get_data_by_key( 'data.auth_code' );
	}

	/**
	 * Gets the contacts associated with this domain
	 *
	 * @return Entity\Domain_Contacts
	 */
	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'data.contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}

	/**
	 * Gets the date the domain was registered to the reseller's account
	 *
	 * @return string|null
	 */
	public function get_created_date(): ?string {
		return $this->get_data_by_key( 'data.created_date' );
	}

	/**
	 * Gets the date the domain registration will expire
	 *
	 * @return string|null
	 */
	public function get_expiration_date(): ?string {
		return $this->get_data_by_key( 'data.expiration_date' );
	}

	/**
	 * Gets the DNSSec key data for the domain, if any exists
	 *
	 * @return string|null
	 */
	public function get_dnssec(): ?string {
		return $this->get_data_by_key( 'data.dnssec' );
	}

	/**
	 * Gets the DNSSec DS data for the domain, if any exists
	 *
	 * @return string|null
	 */
	public function get_dnssec_ds_dsata(): ?string {
		return $this->get_data_by_key( 'data.dnssec_ds_data' );
	}

	/**
	 * Gets the current EPP status codes for the domain
	 *
	 * @return Entity\Epp_Status_Codes
	 * @throws \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception
	 */
	public function get_epp_statuses(): Entity\Epp_Status_Codes {
		$epp_statuses_data = $this->get_data_by_key( 'data.epp_statuses' );
		$epp_statuses = [];
		foreach ( $epp_statuses_data as $epp_status_data ) {
			$epp_statuses[] = new Entity\Epp_Status_Code( $epp_status_data );
		}
		return new Entity\Epp_Status_Codes( ...$epp_statuses );
	}

	/**
	 * Gets the name servers set at the registry for this domain
	 *
	 * @return Entity\Nameservers|null
	 * @throws \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception
	 */
	public function get_name_servers(): ?Entity\Nameservers {
		$nameservers_data = $this->get_data_by_key( 'data.name_servers' );
		$nameservers = [];
		foreach ( $nameservers_data as $nameserver_data ) {
			$domain_name = new Entity\Domain_Name( $nameserver_data );
			$nameservers[] = $domain_name;
		}

		return new Entity\Nameservers( ...$nameservers );
	}

	/**
	 * Gets the date until which the domain has been paid for
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_paid_until(): ?\DateTimeInterface {
		$paid_until_data = $this->get_data_by_key( 'data.paid_until' );
		return null === $paid_until_data ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $paid_until_data );
	}

	/**
	 * Gets the whois privacy setting for the domain
	 *
	 * @return Entity\Whois_Privacy|null
	 * @throws \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception
	 */
	public function get_privacy_setting(): ?Entity\Whois_Privacy {
		$privacy_setting_data = $this->get_data_by_key( 'data.privacy_setting' );

		return new Entity\Whois_Privacy( $privacy_setting_data );
	}

	/**
	 * Gets the date which the domain was transferred to the reseller's account, if the domain was added via an inbound
	 * transfer
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_registrar_transfer_date(): ?\DateTimeInterface {
		$transfer_date_data = $this->get_data_by_key( 'data.registrar_transfer_date' );
		return null === $transfer_date_data ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $transfer_date_data );
	}

	/**
	 * Gets the renewal mode of this domain
	 *
	 * @return string|null
	 */
	public function get_renewal_mode(): ?string {
		return $this->get_data_by_key( 'data.renewal_mode' );
	}

	/**
	 * Gets the Renewal Grace Period (RGP) status for this domain. This is usually one of the following:
	 * - `addPeriod`: The grace period after initial registration of the domain name. If the reseller deletes the domain
	 *      during this period, the registry may provide a credit for the cost of the registration.
	 * - `autoRenewPeriod`: The grace period after a domain name expires. The domain may be renewed at the regular cost
	 *      during this period.
	 *
	 * @return string|null
	 */
	public function get_rgp_status(): ?string {
		return $this->get_data_by_key( 'data.rgp_status' );
	}

	/**
	 * Gets the transferlock status.
	 * - `true`: The domain must be unlocked before it can be transferred.
	 * - `false`: The domain does not need to be unlocked before it can be transferred.
	 *
	 * @return bool|null
	 */
	public function get_transfer_lock(): ?bool {
		return $this->get_data_by_key( 'data.transfer_lock' );
	}

	/**
	 * Gets the transfer mode. One of the following:
	 * - Default: apply the registry policy (usually auto deny)
	 * - `autoapprove`: Automatically approve outbound transfers after 5 days
	 * - `autodeny`: Automatically deny outbound transfers after 5 days
	 *
	 * @return string|null
	 */
	public function get_transfer_mode(): ?string {
		return $this->get_data_by_key( 'data.transfer_mode' );
	}

	/**
	 * Gets the date that the domain was last updated at the registry.
	 *
	 * @return \DateTimeInterface|null
	 */
	public function get_updated_date(): ?\DateTimeInterface {
		$updated_date_data = $this->get_data_by_key( 'data.updated_date' );
		return null === $updated_date_data ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $updated_date_data );
	}
}
