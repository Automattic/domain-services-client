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

class Dns_Get_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain-name.blog' );
		$command = new Command\Dns\Get( $domain );

		$response_data = Test\Lib\Mock\get_mock_response( $command, $domain->get_name(), 'success' );

		/** @var Response\Dns\Get $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Dns\Get::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );

		$response_dns_records = $response_object->get_dns_records();

		$response_domain_name = $response_dns_records->get_domain();
		$this->assertSame( $domain->get_name(), $response_domain_name->get_name() );

		$response_dns_record_sets = $response_dns_records->get_record_sets();

		$response_dns_record_sets_data = $response_dns_record_sets->to_array();
		$this->assertCount( 2, $response_dns_record_sets_data );

		$response_record_sets = $response_object->get_dns_records()->get_record_sets()->to_array();
		$this->assertIsArray( $response_record_sets );
	}
}
