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

class Domain_Contact_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_contact_info_success(): void {
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

		$contact_information_entity = Entity\Contact_Information::from_array( $contact_information );
		$entity = new Entity\Domain_Contact( null, $contact_information_entity );

		$domain_contact = [
			'contact_id' => null,
			'contact_information' => $contact_information,
			'contact_disclosure' => 'none',
		];

		$this->assertSame( $contact_information_entity, $entity->get_contact_information() );
		$this->assertNull( $entity->get_contact_id() );

		$array = $entity->to_array();

		$this->assertArraysEqual( $domain_contact, $array );
	}

	public function test_entity_instance_contact_id_success(): void {
		$contact_id = 'SP1:A-34322';
		$contact_id_entity = new Entity\Contact_Id( $contact_id );
		$entity = new Entity\Domain_Contact( $contact_id_entity, null );

		$domain_contact = [
			'contact_id' => $contact_id,
			'contact_information' => null,
			'contact_disclosure' => 'none',
		];

		$this->assertSame( $contact_id_entity, $entity->get_contact_id() );
		$this->assertNull( $entity->get_contact_information() );

		$array = $entity->to_array();

		$this->assertArraysEqual( $domain_contact, $array );
	}

	public function test_entity_instance_contact_info_from_array_success(): void {
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

		$domain_contact = [
			'contact_id' => null,
			'contact_information' => $contact_information,
			'contact_disclosure' => 'none',
		];

		$entity = Entity\Domain_Contact::from_array( $domain_contact );

		$this->assertNull( $entity->get_contact_id() );
		$this->assertInstanceOf( Entity\Contact_Information::class, $entity->get_contact_information() );
		$this->assertSame( $contact_information, $entity->get_contact_information()->to_array() );

		$array = $entity->to_array();

		$this->assertArraysEqual( $domain_contact, $array );
	}

	public function test_entity_instance_contact_id_from_array_success(): void {
		$contact_id = 'SP1:A-34322';

		$domain_contact = [
			'contact_id' => $contact_id,
			'contact_information' => null,
			'contact_disclosure' => 'none',
		];

		$entity = Entity\Domain_Contact::from_array( $domain_contact );

		$this->assertNull( $entity->get_contact_information() );
		$this->assertInstanceOf( Entity\Contact_Id::class, $entity->get_contact_id() );
		$this->assertSame( $contact_id, (string) $entity->get_contact_id() );

		$array = $entity->to_array();

		$this->assertArraysEqual( $domain_contact, $array );
	}
}
