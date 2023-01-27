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

namespace Automattic\Domain_Services\Test\Api;

use Automattic\Domain_Services\{Command, Entity, Response, Test};

/**
 * Run tests with
 *
 *     ./vendor/bin/phpunit -c ./test/phpunit.xml --filter Suggestions_E2E_Test
 */
class Domain_Suggestions_E2E_Test extends Test\Lib\Domain_Services_Client_E2e_Test_Case {


	public function test_suggestions_success(): void {
		$command = new Command\Domain\Suggestions( 'test-domain-suggestions-query', 5 );
		$client_transaction_id = $this->generate_client_transaction_id();

		/** @var Response\Domain\Suggestions $response */
		$response = $this->api->post( $command, $client_transaction_id );

		$this->assertSame( Response\Code::SUCCESS, $response->get_status() );
		$this->assertTrue( $response->is_success() );
		$this->assertSame( $client_transaction_id, $response->get_client_txn_id() );

		$suggestions = $response->get_suggestions();
		$this->assertInstanceOf( Entity\Suggestions::class, $suggestions );
		$this->assertCount( 5, $suggestions->get_suggestions() );
	}

	public function test_suggestions_with_no_query(): void {
		$command = new Command\Domain\Suggestions( '', 5 );
		$client_transaction_id = $this->generate_client_transaction_id();

		/** @var Response\Domain\Suggestions $response */
		$response = $this->api->post( $command, $client_transaction_id );

		$this->assertSame( Response\Code::SUCCESS, $response->get_status() );
		$this->assertTrue( $response->is_success() );
		$this->assertSame( $client_transaction_id, $response->get_client_txn_id() );

		$suggestions = $response->get_suggestions();
		$this->assertInstanceOf( Entity\Suggestions::class, $suggestions );
		$this->assertCount( 0, $suggestions->get_suggestions() );
	}

}
