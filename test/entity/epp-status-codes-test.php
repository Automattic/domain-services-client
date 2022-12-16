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

class Epp_Status_Codes_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$status_codes_entities = [];
		$status_codes_array = array_keys( Entity\Epp_Status_Code::VALID_EPP_STATUSES );
		foreach ( $status_codes_array as $code ) {
			$status_codes_entities[] = new Entity\Epp_Status_Code( $code );
		}

		$entity = new Entity\Epp_Status_Codes( ...$status_codes_entities );

		$this->assertArraysEqual( $status_codes_array, $entity->to_array() );

		foreach ( $entity as $i => $status_code_entity ) {
			$this->assertSame( $status_codes_array[ $i ], (string) $status_code_entity );
		}
	}

	public function test_entity_instance_using_add_success(): void {
		$status_codes_array = array_keys( Entity\Epp_Status_Code::VALID_EPP_STATUSES );
		$entity = new Entity\Epp_Status_Codes();

		foreach ( $status_codes_array as $code ) {
			$entity->add_epp_code( new Entity\Epp_Status_Code( $code ) );
		}


		$this->assertArraysEqual( $status_codes_array, $entity->to_array() );

		foreach ( $entity as $i => $status_code_entity ) {
			$this->assertSame( $status_codes_array[ $i ], (string) $status_code_entity );
		}
	}
}
