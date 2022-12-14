<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Exception, Response, Test};

class Dns_Record_Type_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public const VALID_RECORD_TYPES = [
		'A',
		'AAAA',
		'ALIAS',
		'CAA',
		'CNAME',
		'MX',
		'NS',
		'PTR',
		'TXT',
		'SOA',
		'SRV',
	];

	public function test_entity_instance_success_disclose_all(): void {
		foreach ( self::VALID_RECORD_TYPES as $type ) {
			$entity = new Entity\Dns_Record_Type( $type );
			$this->assertSame( $type, (string) $entity );
		}
	}

	public function test_entity_instance_fail(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );
		new Entity\Dns_Record_Type( 'INVALID' );
	}
}
