<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\{Entity, Response};

class Register implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_domain_status(): ?string {
		return $this->get_data_by_key( 'data.domain_status' );
	}

	public function get_created_date(): ?string {
		return $this->get_data_by_key( 'data.created_date' );
	}

	public function get_expiration_date(): ?string {
		return $this->get_data_by_key( 'data.expiration_date' );
	}

	public function get_renewal_date(): ?string {
		return $this->get_data_by_key( 'data.renewal_date' );
	}

	public function get_unverified_contact_suspension_date(): ?string {
		return $this->get_data_by_key( 'data.unverified_contact_suspension_date' );
	}

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'data.contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}
}

//'status_description' => 'Command completed successfully',
//  'success' => true,
//  'client_txn_id' => 'test-client-transaction-id-2',
//  'server_txn_id' => '3dc80439-863d-4f74-8c28-b5666345f0f7.local-isolated-test-request',
//  'timestamp' => 1667837296,
//  'runtime' => 0.0005,
//  'domain_status' => 'ACTIVE',
//  'created_date' => '2022-06-24 15:18:08.0',
//  'expiration_date' => '2023-06-24 15:18:08.0',
//  'renewal_date' => '2023-07-29 15:18:08.0',
//  'unverified_contact_suspension_date' => '2022-07-09 15:18:08',
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
