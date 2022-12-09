<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Test};

class Epp_Status_Codes_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$status_codes_entities = [];
		$status_codes_array = array_keys( Entity\Epp_Status_Code::VALID_EPP_STATUSES );
		foreach ( $status_codes_array as $code ) {
			$status_codes_entities[] = new Entity\Epp_Status_Code( $code );
		}

		$entity = new Entity\Epp_Status_Codes( ...$status_codes_entities );

		$this->assertArraysEqual( $status_codes_array, $entity->to_array() );

		foreach ( $entity as $i => $status_code_entity ) {
			$this->assertSame( $status_codes_array[ $i ], (string) $status_code_entity );
		}
	}

	public function test_entity_instance_using_add_success(): void {
		$status_codes_array = array_keys( Entity\Epp_Status_Code::VALID_EPP_STATUSES );
		$entity = new Entity\Epp_Status_Codes();

		foreach ( $status_codes_array as $code ) {
			$entity->add_epp_code( new Entity\Epp_Status_Code( $code ) );
		}


		$this->assertArraysEqual( $status_codes_array, $entity->to_array() );

		foreach ( $entity as $i => $status_code_entity ) {
			$this->assertSame( $status_codes_array[ $i ], (string) $status_code_entity );
		}
	}
}
