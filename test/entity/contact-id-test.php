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

class Contact_Id_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$contact_id = 'SP1:P-ABC1234';

		$entity = new Entity\Contact_Id( $contact_id );

		$this->assertSame( $contact_id, (string) $entity );
	}

	public function test_entity_instance_fail_invalid_contact_id_format(): void {
		$contact_id = 'invalid contact id format';

		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );

		new Entity\Contact_Id( $contact_id );
	}
}
