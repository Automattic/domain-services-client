<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Test};

class Dns_Record_Set_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$record = [
			'name' => 'www2',
			'type' => 'CNAME',
			'ttl' => 3600,
			'data' => [ 'nomado-test-2022-07-11.com.' ],
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
			'data' => [ 'nomado-test-2022-07-11.com.' ],
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
			'data' => [ 'nomado-test-2022-07-11.com.' ],
		];

		$this->expectException( \TypeError::class );

		// Intentionally passing type as a string instead of Dns_Record_Type
		new Entity\Dns_Record_Set( $record['name'], $record['type'], $record['ttl'], $record['data'] );
	}
}
