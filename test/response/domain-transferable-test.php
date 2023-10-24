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

use Automattic\Domain_Services_Client\{Command, Entity, Response, Test};

class Domain_Transferable_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain-name.blog' );
		$auth_code = 'test-auth-code';

		$command = new Command\Domain\Transferable( $domain, $auth_code );

		$mock_response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '990c3ae1-3210-49f2-9ce6-51a14bc2a2c6.local-isolated-test-request',
			'timestamp' => 1669075523,
			'runtime' => 0.0029,
			'data' => [
				'transferable' => true,
				'transferlock' => false,
				'pending_transfer' => false,
				'registered_within_60_days' => false,
			],
		];

		/** @var Response\Domain\Transfer $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Transferable::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );

		$this->assertTrue( $response_object->get_transferable() );
		$this->assertFalse( $response_object->get_transferlock() );
		$this->assertFalse( $response_object->get_pending_transfer() );
		$this->assertFalse( $response_object->get_registered_within_60_days() );
	}
}
