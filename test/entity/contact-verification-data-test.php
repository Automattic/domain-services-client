<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Exception, Response, Test};

class Contact_Verification_Data_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$code = 'test-code';
		$entity = new Entity\Contact_Verification_Data( $code );
		$this->assertSame( $code, $entity->get_code() );
	}

	public function test_entity_instance_fail(): void {
		$this->expectException( \ArgumentCountError::class );

		// Intentionally trying to create an instance with no arguments.
		new Entity\Contact_Verification_Data();
	}
}
