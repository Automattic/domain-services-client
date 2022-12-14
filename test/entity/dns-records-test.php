<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Test};

class Dns_Records_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$domain = 'nomado-dns-records-test.com';
		$records = [
			[
				'name' => 'www2',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-dns-records-test.com.' ]
			],
			[
				'name' => 'www3',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-dns-records-test.com.' ]
			],
		];

		$entity = new Entity\Dns_Records( new Entity\Domain_Name( $domain ), Entity\Dns_Record_Sets::from_array( $records ) );
		$array = $entity->to_array();

		$this->assertSame( $domain, $array['domain'] );
		$this->assertArraysEqual( $records, $array['record_sets'] );

		foreach ( $entity->get_record_sets() as $i => $record_entity ) {
			$this->assertArraysEqual( $records[ $i ], $record_entity->to_array() );
		}
	}

	public function test_entity_instance_from_array_success(): void {
		$domain = 'nomado-dns-records-test.com';
		$records = [
			[
				'name' => 'www2',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-dns-records-test.com.' ]
			],
			[
				'name' => 'www3',
				'type' => 'CNAME',
				'ttl' => 3600,
				'data' => [ 'nomado-dns-records-test.com.' ]
			],
		];

		$entity = Entity\Dns_Records::from_array( [
			'domain' => $domain,
			'record_sets' => $records,
		] );

		$array = $entity->to_array();

		$this->assertSame( $domain, $array['domain'] );
		$this->assertArraysEqual( $records, $array['record_sets'] );

		foreach ( $entity->get_record_sets() as $i => $record_entity ) {
			$this->assertArraysEqual( $records[ $i ], $record_entity->to_array() );
		}
	}
}
