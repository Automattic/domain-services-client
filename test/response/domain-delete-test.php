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

class Domain_Delete_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain_name = new Entity\Domain_Name( 'test-domain-name.com' );
		$command = new Command\Domain\Delete( $domain_name );

		$response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => '33b6f31e-91c2-452a-b88c-5a5c22ff98c9.local-isolated-test-request',
			'timestamp' => 1669075519,
			'runtime' => 0.0023,
		];

		/** @var Response\Domain\Delete $response_object */
		$response_object = $this->response_factory->build_response( $command, $response_data );

		$this->assertInstanceOf( Response\Domain\Delete::class, $response_object );

		$this->assertIsValidResponse( $response_data, $response_object );
	}
}
