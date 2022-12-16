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

namespace Automattic\Domain_Services\Test\Lib;

use Automattic\Domain_Services\{Mock, Response};

class Domain_Services_Client_Test_Case extends \PHPUnit\Framework\TestCase {
	protected Response\Factory $response_factory;

	public function setUp(): void {
		parent::setUp();
		$this->response_factory = new Response\Factory();
	}

	public function assertIsValidResponse( array $expected_data, Response\Response_Interface $response ): void {
		$this->assertInstanceOf( Response\Response_Interface::class, $response );

		$this->assertIsString( $response->get_server_txn_id() );
		$this->assertEquals( $expected_data['server_txn_id'], $response->get_server_txn_id() );

		$this->assertIsInt( $response->get_timestamp() );
		$this->assertEquals( $expected_data['timestamp'], $response->get_timestamp() );

		$this->assertIsFloat( $response->get_runtime() );
		$this->assertEquals( $expected_data['runtime'], $response->get_runtime() );

		$this->assertIsBool( $response->is_success() );
		$this->assertEquals( $expected_data['success'], $response->is_success() );

		$this->assertIsString( $response->get_client_txn_id() );
		$this->assertEquals( $expected_data['client_txn_id'], $response->get_client_txn_id() );

		$this->assertIsString( $response->get_status_description() );
		$this->assertEquals( $expected_data['status_description'], $response->get_status_description() );
	}

	private function ksortMultidimensionalArray( array &$array ): void {
		foreach ( $array as $key => $value ) {
			if ( is_array( $value ) ) {
				$this->ksortMultidimensionalArray( $array[ $key ] );
			}
		}
		ksort( $array );
	}

	public function assertArraysEqual( array $expected, array $actual, string $message = '' ): void {
		$this->ksortMultidimensionalArray( $expected );
		$this->ksortMultidimensionalArray( $actual );

		$this->assertEquals( $expected, $actual, $message );
	}
}
