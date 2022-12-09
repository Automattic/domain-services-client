<?php declare( strict_types=1 );

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
