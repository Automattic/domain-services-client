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

namespace Automattic\Domain_Services_Client\Test\Response;

use Automattic\Domain_Services_Client\{Command, Response, Test};

class Domain_Suggestions_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '6e3f18b1-330c-4f6a-b780-351b999c9bb6.local-isolated-test-request',
			'timestamp' => 1669075520,
			'runtime' => 0.0021,
			'data' => [
				'suggestions' => array_map(
					static fn( $i ) => [
						'name' => "example$i.blog",
						'reseller_register_fee' => $i * 100,
						'reseller_renewal_fee' => $i * 100,
						'is_premium' => false,
						'is_available' => true,
						'zone_is_active' => true,
					],
					range( 1, 10 )
				),
			],
		];

		$command = new Command\Domain\Suggestions( 'example query', 10 );

		/** @var Response\Domain\Suggestions $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Suggestions::class, $response_object );
		$this->assertIsValidResponse( $response_data, $response_object );
		$this->assertArraysEqual( $response_data['data'], $response_object->get_suggestions()->to_array() );
	}
}

