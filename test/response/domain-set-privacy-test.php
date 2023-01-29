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

class Domain_Set_Privacy_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_response_factory_success(): void {
		$domain = new Entity\Domain_Name( 'test-domain-name.blog' );
		$whois_privacy_settings = new Entity\Whois_Privacy( Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE );

		$command = new Command\Domain\Set\Privacy( $domain, $whois_privacy_settings );

		$mock_response_data = [
			'status' => 200,
			'status_description' => 'Command completed successfully',
			'success' => true,
			'client_txn_id' => 'test-client-transaction-id',
			'server_txn_id' => 'd0befeca-b291-460d-bf32-59e84b3e4428.local-isolated-test-request',
			'timestamp' => 1669075523,
			'runtime' => 0.0029,
		];

		/** @var Response\Domain\Set\Privacy $response_object */
		$response_object = $this->response_factory->build_response( $command, $mock_response_data );

		$this->assertInstanceOf( Response\Domain\Set\Privacy::class, $response_object );

		$this->assertIsValidResponse( $mock_response_data, $response_object );
	}
}
