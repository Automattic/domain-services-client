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
 * Response of a Domain_Info command.
 *
 * If the domain is not registered with us, returns the same information of a Domain_Check command.
 */
class Info implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_auth_code(): string {
		return $this->get_data_by_key( 'data.auth_code' );
	}

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'data.contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}

	public function get_created_date(): ?string {
		return $this->get_data_by_key( 'data.created_date' );
	}

	public function get_dnssec(): ?string {
		return $this->get_data_by_key( 'data.dnssec' );
	}

	public function get_dnssec_ds_dsata(): ?string {
		return $this->get_data_by_key( 'data.dnssec_ds_data' );
	}

	public function get_epp_statuses(): Entity\Epp_Status_Codes {
		$epp_statuses_data = $this->get_data_by_key( 'data.epp_statuses' );
		$epp_statuses = [];
		foreach ( $epp_statuses_data as $epp_status_data ) {
			$epp_statuses[] = new Entity\Epp_Status_Code( $epp_status_data );
		}
		return new Entity\Epp_Status_Codes( ...$epp_statuses );
	}

	public function get_name_servers(): ?Entity\Nameservers {
		$nameservers_data = $this->get_data_by_key( 'data.name_servers' );
		$nameservers = [];
		foreach ( $nameservers_data as $nameserver_data ) {
			$domain_name = new Entity\Domain_Name( $nameserver_data );
			$nameservers[] = $domain_name;
		}

		return new Entity\Nameservers( ...$nameservers );
	}

	public function get_paid_until(): ?\DateTimeInterface {
		$paid_until_data = $this->get_data_by_key( 'data.paid_until' );
		return null === $paid_until_data ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $paid_until_data );
	}

	public function get_privacy_setting(): ?Entity\Whois_Privacy {
		$privacy_setting_data = $this->get_data_by_key( 'data.privacy_setting' );

		return new Entity\Whois_Privacy( $privacy_setting_data );
	}

	public function get_registrar_transfer_date(): ?\DateTimeInterface {
		$transfer_date_data = $this->get_data_by_key( 'data.registrar_transfer_date' );
		return null === $transfer_date_data ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $transfer_date_data );
	}

	public function get_renewal_mode(): ?string {
		return $this->get_data_by_key( 'data.renewal_mode' );
	}

	public function get_rgp_status(): ?string {
		return $this->get_data_by_key( 'data.rgp_status' );
	}

	public function get_transfer_lock(): ?bool {
		return $this->get_data_by_key( 'data.transfer_lock' );
	}

	public function get_transfer_mode(): ?string {
		return $this->get_data_by_key( 'data.transfer_mode' );
	}

	public function get_updated_date(): ?\DateTimeInterface {
		$updated_date_data = $this->get_data_by_key( 'data.updated_date' );
		return null === $updated_date_data ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $updated_date_data );
	}
}
