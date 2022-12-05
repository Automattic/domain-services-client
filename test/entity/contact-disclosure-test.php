<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Exception, Response, Test};

class Contact_Disclosure_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success_disclose_all(): void {
		$entity = new Entity\Contact_Disclosure( Entity\Contact_Disclosure::ALL );
		$this->assertSame( Entity\Contact_Disclosure::ALL, (string) $entity );
	}

	public function test_entity_instance_success_disclose_none(): void {
		$entity = new Entity\Contact_Disclosure( Entity\Contact_Disclosure::NONE );
		$this->assertSame( Entity\Contact_Disclosure::NONE, (string) $entity );
	}

	public function test_entity_instance_fail(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );
		new Entity\Contact_Disclosure( 'invalid_disclosure_value' );
	}
}
