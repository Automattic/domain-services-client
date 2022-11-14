<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\{Entity, Exception, Response};

/**
 * Response of a Domain_Info command.
 *
 * If the domain is not registered with us, returns the same information of a Domain_Check command.
 */
class Info implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_auth_code(): string {
		return $this->get_data_by_key( 'auth_code' );
	}

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}

	public function get_created_date(): ?string {
		return $this->get_data_by_key( 'created_date' );
	}

	public function get_dnssec(): ?string {
		return $this->get_data_by_key( 'dnssec' );
	}

	public function get_dnssec_ds_dsata(): ?string {
		return $this->get_data_by_key( 'dnssec_ds_data' );
	}

	public function get_epp_statuses(): Entity\Epp_Status_Codes {
		$epp_statuses_data = $this->get_data_by_key( 'epp_statuses' );
		$epp_statuses = [];
		foreach( $epp_statuses_data as $epp_status_data ) {
			$epp_statuses[] = new Entity\Epp_Status_Code( $epp_status_data );
		}
		return new Entity\Epp_Status_Codes( ...$epp_statuses );
	}

	public function get_name_servers(): ?Entity\Nameservers {
		$nameservers_data = $this->get_data_by_key( 'nameservers' );
		$nameservers = [];
		foreach ( $nameservers_data as $nameserver_data ) {
			$domain_name = new Entity\Domain_Name( $nameserver_data );
			$nameservers[] = $domain_name;
		}

		return new Entity\Nameservers( ...$nameservers );
	}

	public function get_paid_until(): ?string {
		return $this->get_data_by_key( 'paid_until' );
	}

	public function get_privacy_setting(): ?Entity\Whois_Privacy {
		$privacy_setting_data = $this->get_data_by_key( 'privacy_setting' );

		return new Entity\Whois_Privacy( $privacy_setting_data );
	}

	public function get_registrar_transfer_date(): ?string {
		return $this->get_data_by_key( 'registrar_transfer_date' );
	}

	public function get_renewal_mode(): ?string {
		return $this->get_data_by_key( 'renewal_mode' );
	}

	public function get_rgp_status(): ?string {
		return $this->get_data_by_key( 'rgp_status' );
	}

	public function get_transfer_lock(): ?bool {
		return $this->get_data_by_key( 'transfer_lock' );
	}

	public function get_updated_date(): ?string {
		return $this->get_data_by_key( 'updated_date' );
	}
}

//  'status' => 200,
//  'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id',
//  'server_txn_id' => '51b01758-782f-4385-b81f-c17a7cab5178.local-isolated-test-request',
//  'timestamp' => 1667827541,
//  'runtime' => 0.0038,
//  'auth_code' => 'test-auth-code',
//  'contacts' =>
//  array (
//		'owner' => [
//			'contact_id' => 'SP1:ABC1234'
//		],
//		'admin' => [
//			'contact_id' => 'SP1:ABC1234'
//		],
//		'tech' => [
//			'contact_id' => 'SP1:ABC1234'
//		],
//		'billing' => [
//			'contact_id' => 'SP1:ABC1234'
//		],
//  ),
//  'created_date' => '2022-06-22 01:23:45.0',
//  'dnssec' => NULL,
//  'dnssec_ds_data' => NULL,
//  'epp_statuses' =>
//  array (
//	  0 => 'clientTransferProhibited',
//	  1 => 'serverTransferProhibited',
//  ),
//  'name_servers' =>  // I think this should be 'nameservers'
//  array (
//	  0 => 'NS1.WORDPRESS.COM',
//	  1 => 'NS2.WORDPRESS.COM',
//  ),
//  'paid_until' => '2023-06-24 06:54:32.0',
//  'privacy_setting' => 'enable_privacy_service',
//  'registrar_transfer_date' => NULL,
//  'renewal_mode' => 'DEFAULT',
//  'rgp_status' => 'addPeriod',
//  'transfer_lock' => true,
//  'transfer_mode' => 'DEFAULT',
//  'updated_date' => '2022-06-24 06:54:32.0',
