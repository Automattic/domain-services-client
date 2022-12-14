<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Test};

class Dns_Record_Sets_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$records = [
			[
				'name' => 'www2',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-test-2022-07-11.com.' ]
			],
			[
				'name' => 'www3',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-test-2022-07-11.com.' ]
			],
		];

		foreach ( $records as $record ) {
			$record_sets[] = new Entity\Dns_Record_Set( $record['name'], new Entity\Dns_Record_Type( $record['type'] ), $record['ttl'], $record['data'] );
			$strings[] = $record['name'] . ' ' . $record['ttl'] . ' ' . $record['type'] . ' ' . implode( ', ', $record['data'] );
		}

		$entity = new Entity\Dns_Record_Sets( ...$record_sets );

		$this->assertArraysEqual( $records, $entity->to_array() );

		foreach ( $entity as $i => $record_entity ) {
			$this->assertArraysEqual( $records[ $i ], $record_entity->to_array() );
			$this->assertSame( $strings[ $i ], (string) $record_entity );

		}
	}

	public function test_entity_instance_from_array_success(): void {
		$records = [
			[
				'name' => 'www2',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-test-2022-07-11.com.' ]
			],
			[
				'name' => 'www3',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-test-2022-07-11.com.' ]
			],
		];

		foreach ( $records as $record ) {
			$strings[] = $record['name'] . ' ' . $record['ttl'] . ' ' . $record['type'] . ' ' . implode( ', ', $record['data'] );
		}

		$entity = Entity\Dns_Record_Sets::from_array( $records );

		$this->assertArraysEqual( $records, $entity->to_array() );

		foreach ( $entity as $i => $record_entity ) {
			$this->assertArraysEqual( $records[ $i ], $record_entity->to_array() );
			$this->assertSame( $strings[ $i ], (string) $record_entity );

		}
	}
}
