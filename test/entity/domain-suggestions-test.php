<?php declare( strict_types=1 );
/*
 * Copyright (c) 2023 Automattic, Inc.
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

class Domain_Suggestions_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	public function test_entity_instance_success(): void {
		$domain_suggestion_data = array_map( static fn( $i ) => [ 'name' => "example$i.blog" ], range( 1, 10 ) );
		$domain_name_list = array_map( static fn( $n ) => new Entity\Domain_Name( $n['name'] ), $domain_suggestion_data );
		$suggestion_list = array_map( static fn( $d ) => new Entity\Suggestion( $d ), $domain_name_list );
		$suggestions = new Entity\Suggestions( ... $suggestion_list );

		$this->assertArraysEqual( $domain_suggestion_data, $suggestions->to_array()['suggestions'] );
	}
}
