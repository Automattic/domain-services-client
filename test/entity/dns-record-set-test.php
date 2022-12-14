<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Test};

class Dns_Record_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$record = [
			'name' => 'www2',
			'type' => 'CNAME',
			'ttl' => 3600,
			'data' => [ 'nomado-test-2022-07-11.com.' ]
		];

		$entity = new Entity\Dns_Record_Set( $record['name'], new Entity\Dns_Record_Type( $record['type'] ), $record['ttl'], $record['data'] );
		$this->assertArraysEqual( $record, $entity->to_array() );

		$string = $record['name'] . ' ' . $record['ttl'] . ' ' . $record['type'] . ' ' . implode( ', ', $record['data'] );
		$this->assertSame( $string, (string) $entity );
	}

	public function test_entity_instance_from_array_success(): void {
		$record = [
			'name' => 'www2',
			'type' => 'CNAME',
			'ttl' => 3600,
			'data' => [ 'nomado-test-2022-07-11.com.' ]
		];

		$entity = Entity\Dns_Record_Set::from_array( $record );
		$this->assertArraysEqual( $record, $entity->to_array() );

		$string = $record['name'] . ' ' . $record['ttl'] . ' ' . $record['type'] . ' ' . implode( ', ', $record['data'] );
		$this->assertSame( $string, (string) $entity );
	}

	public function test_entity_instance_fail(): void {
		$record = [
			'name' => 'www2',
			'type' => 'CNAME',
			'ttl' => 3600,
			'data' => [ 'nomado-test-2022-07-11.com.' ]
		];

		$this->expectException( \TypeError::class );

		// Intentionally passing type as a string instead of Dns_Record_Type
		$entity = new Entity\Dns_Record_Set( $record['name'], $record['type'], $record['ttl'], $record['data'] );
	}
}
