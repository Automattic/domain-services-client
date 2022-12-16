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

use Automattic\Domain_Services\{Entity, Exception, Response, Test};

class Nameservers_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$nameservers = $this->generate_nameservers( 2 );
		$nameserver_entities = [];

		foreach ( $nameservers as $nameserver ) {
			$nameserver_entities[] = new Entity\Domain_Name( $nameserver );
		}

		$entity = new Entity\Nameservers( ...$nameserver_entities );

		$this->assertArraysEqual( $nameservers, $entity->to_array() );
	}

	public function test_entity_instance_using_add_success(): void {
		$nameservers = $this->generate_nameservers( 4 );
		$nameserver_entities = [];

		foreach ( array_slice( $nameservers, 0, 2 ) as $nameserver ) {
			$nameserver_entities[] = new Entity\Domain_Name( $nameserver );
		}

		$entity = new Entity\Nameservers( ...$nameserver_entities );

		foreach ( array_slice( $nameservers, 2, 2 ) as $nameserver ) {
			$entity->add_nameserver( new Entity\Domain_Name( $nameserver ) );
		}

		$this->assertArraysEqual( $nameservers, $entity->to_array() );
	}

	public function test_entity_instance_fail_too_few(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );

		$nameservers = $this->generate_nameservers( 1 );
		$nameserver_entities = [];

		foreach ( $nameservers as $nameserver ) {
			$nameserver_entities[] = new Entity\Domain_Name( $nameserver );
		}

		new Entity\Nameservers( ...$nameserver_entities );
	}

	public function test_entity_instance_fail_too_many(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );

		$nameservers = $this->generate_nameservers( 13 );
		$nameserver_entities = [];

		foreach ( $nameservers as $nameserver ) {
			$nameserver_entities[] = new Entity\Domain_Name( $nameserver );
		}

		new Entity\Nameservers( ...$nameserver_entities );
	}

	public function test_entity_instance_fail_too_many_using_add(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );

		$nameservers = $this->generate_nameservers( 13 );
		$nameserver_entities = [];

		foreach ( array_slice( $nameservers, 0, 2 ) as $nameserver ) {
			$nameserver_entities[] = new Entity\Domain_Name( $nameserver );
		}

		$entity = new Entity\Nameservers( ...$nameserver_entities );

		foreach ( array_slice( $nameservers, 2 ) as $nameserver ) {
			$entity->add_nameserver( new Entity\Domain_Name( $nameserver ) );
		}
	}

	private function generate_nameservers( int $count ) {
		$nameservers = [];

		for ( $i = 1; $i <= $count; $i ++ ) {
			$nameservers[] = "ns$i.nameservers-test.com";
		}

		return $nameservers;
	}
}
