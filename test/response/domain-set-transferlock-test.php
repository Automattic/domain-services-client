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

class Domain_Set_Transferlock_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Set\Transferlock( $domain_name, true );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id-1',
			'server_txn_id' => '54466af3-153b-4dc3-99ca-852908d1dd22.local-isolated-test-request',
			'timestamp' => 1669075524,
			'runtime' => 0.0061,
		];

		/** @var Response\Domain\Set\Transferlock $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Set\Transferlock::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );
	}
}
