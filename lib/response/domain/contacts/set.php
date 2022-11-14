<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain\Contacts;

use Automattic\Domain_Services\{Entity, Response};

class Set implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_contacts(): Entity\Domain_Contacts {
		$contact_data = $this->get_data_by_key( 'contacts' ) ?? [];
		return Entity\Domain_Contacts::from_array( $contact_data );
	}
}

//[
//	'status' => 200,
//	'status_description' => 'Command completed successfully',
//	'success' => true,
//	'client_txn_id' => 'mock_txn_id',
//	'contacts' => [
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
//	],
//]


//array (
//	'status' => 200,
//	'status_description' => 'Command completed successfully',
//	'success' => true,
//	'client_txn_id' => 'test-client-transaction-id-1',
//	'server_txn_id' => 'ffff5e79-72d7-4c68-8eca-b1ce9ac97a92.local-isolated-test-request',
//	'timestamp' => 1668282939,
//	'runtime' => 0.0077,
//	'contacts' =>
//		array (
//			'owner' =>
//				array (
//					'contact_id' => 'SP1:P-ABC1234',
//				),
//		),
//)
