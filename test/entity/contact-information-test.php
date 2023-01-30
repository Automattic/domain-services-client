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

namespace Automattic\Domain_Services_Client\Test\Entity;

use Automattic\Domain_Services_Client\{Entity, Exception, Response, Test};

class Contact_Information_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success_construct_entity(): void {
		$contact_information = [
			'first_name' => 'Domains',
			'last_name' => 'Developer',
			'organization' => 'Automattic',
			'address_1' => '60 29th Street',
			'address_2' => '#343',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'domains@example.com',
			'phone' => '+1.8772733049',
			'fax' => '+1.8881234567',
		];

		$entity = new Entity\Contact_Information(
			$contact_information['first_name'],
			$contact_information['last_name'],
			$contact_information['organization'],
			$contact_information['address_1'],
			$contact_information['address_2'],
			$contact_information['postal_code'],
			$contact_information['city'],
			$contact_information['state'],
			$contact_information['country_code'],
			$contact_information['email'],
			$contact_information['phone'],
			$contact_information['fax'],
		);

		$this->assertArraysEqual( $contact_information, $entity->to_array() );
	}

	public function test_entity_instance_success_set_by_key(): void {
		$contact_information = [
			'first_name' => 'Domains',
			'last_name' => 'Developer',
			'organization' => 'Automattic',
			'address_1' => '60 29th Street',
			'address_2' => '#343',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'domains@example.com',
			'phone' => '+1.8772733049',
			'fax' => '+1.8881234567',
		];

		$entity = new Entity\Contact_Information();
		$entity->set_by_key( 'first_name', $contact_information['first_name'] )
			->set_by_key( 'last_name', $contact_information['last_name'] )
			->set_by_key( 'organization', $contact_information['organization'] )
			->set_by_key( 'address_1', $contact_information['address_1'] )
			->set_by_key( 'address_2', $contact_information['address_2'] )
			->set_by_key( 'postal_code', $contact_information['postal_code'] )
			->set_by_key( 'city', $contact_information['city'] )
			->set_by_key( 'state', $contact_information['state'] )
			->set_by_key( 'country_code', $contact_information['country_code'] )
			->set_by_key( 'email', $contact_information['email'] )
			->set_by_key( 'phone', $contact_information['phone'] )
			->set_by_key( 'fax', $contact_information['fax'] );

		$this->assertArraysEqual( $contact_information, $entity->to_array() );
	}

	public function test_entity_instance_success_from_array(): void {
		$contact_information = [
			'first_name' => 'Domains',
			'last_name' => 'Developer',
			'organization' => 'Automattic',
			'address_1' => '60 29th Street',
			'address_2' => '#343',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'domains@example.com',
			'phone' => '+1.8772733049',
			'fax' => '+1.8881234567',
		];

		$entity = Entity\Contact_Information::from_array( $contact_information );

		$this->assertArraysEqual( $contact_information, $entity->to_array() );
	}

	public function test_entity_instance_success_from_array_allows_extra_keys(): void {
		$contact_information = [
			'first_name' => 'Domains',
			'last_name' => 'Developer',
			'organization' => 'Automattic',
			'address_1' => '60 29th Street',
			'address_2' => '#343',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'domains@example.com',
			'phone' => '+1.8772733049',
			'fax' => '+1.8881234567',
			'extra_key' => 'some other info',
		];

		$entity = Entity\Contact_Information::from_array( $contact_information );

		unset( $contact_information['extra_key'] );

		$this->assertArraysEqual( $contact_information, $entity->to_array() );
	}

	public function test_entity_instance_success_getters(): void {
		$contact_information = [
			'first_name' => 'Domains',
			'last_name' => 'Developer',
			'organization' => 'Automattic',
			'address_1' => '60 29th Street',
			'address_2' => '#343',
			'postal_code' => '94110',
			'city' => 'San Francisco',
			'state' => 'CA',
			'country_code' => 'US',
			'email' => 'domains@example.com',
			'phone' => '+1.8772733049',
			'fax' => '+1.8881234567',
		];

		$entity = Entity\Contact_Information::from_array( $contact_information );

		$this->assertSame( $contact_information['first_name'], $entity->get_first_name() );
		$this->assertSame( $contact_information['last_name'], $entity->get_last_name() );
		$this->assertSame( $contact_information['organization'], $entity->get_organization() );
		$this->assertSame( $contact_information['address_1'], $entity->get_address_1() );
		$this->assertSame( $contact_information['address_2'], $entity->get_address_2() );
		$this->assertSame( $contact_information['postal_code'], $entity->get_postal_code() );
		$this->assertSame( $contact_information['city'], $entity->get_city() );
		$this->assertSame( $contact_information['state'], $entity->get_state() );
		$this->assertSame( $contact_information['country_code'], $entity->get_country_code() );
		$this->assertSame( $contact_information['email'], $entity->get_email() );
		$this->assertSame( $contact_information['phone'], $entity->get_phone() );
		$this->assertSame( $contact_information['fax'], $entity->get_fax() );
	}

	public function test_entity_instance_fail_bad_key_from_array(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );

		$entity = new Entity\Contact_Information();
		$entity->set_by_key( 'invalid contact key', 'foo' );
	}
}
