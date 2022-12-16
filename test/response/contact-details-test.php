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

namespace Automattic\Domain_Services\Test\Response;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

class Contact_Details_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$contact_id = new Entity\Contact_Id( 'SP1:P-ABC2134' );
		$command = new Command\Contact\Details( $contact_id );

		$response_data = Test\Lib\Mock\get_mock_response( $command, null, 'success' );

		/** @var Response\Contact\Details $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Contact\Details::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$contact_information = $response_object->get_contact_information()->to_array();
		$this->assertSame( $response_data['data']['contact_information'], $contact_information );
	}
}
