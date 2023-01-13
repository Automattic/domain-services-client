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

namespace Automattic\Domain_Services\Response;

use Automattic\Domain_Services\{Command, Event, Exception};

class Factory {
	/**
	 * Builds a response from the provided response data
	 *
	 * @param Command\Command_Interface $command
	 * @param array                     $response
	 *
	 * @return Response_Interface
	 * @throws Exception\Command\Invalid_Format_Exception
	 * @throws Exception\Command\Missing_Option_Exception
	 * @throws Exception\Domain_Services_Exception
	 */
	public function build_response( Command\Command_Interface $command, array $response ): Response_Interface {
		if ( false === $response['success'] ) {
			throw new Exception\Domain_Services_Exception( $response['status'], $response );
		}

		$class_name = $command::get_name();

		if ( empty( $class_name ) ) {
			throw new Exception\Command\Missing_Option_Exception( 'command_name' );
		}

		if ( ! empty( $response['response']['data'] ) && ! is_array( $response['response']['data'] ) ) {
			throw new Exception\Command\Invalid_Format_Exception( 'Response data must be array' );
		}

		$class_name = __NAMESPACE__ . '\\' . $class_name;
		if ( ! class_exists( $class_name ) ) {
			throw new Exception\Domain_Services_Exception( Code::INVALID_COMMAND_NAME, [ 'message' => 'Missing response class: ' . $class_name ] );
		}

		$response = new $class_name( $response );

		if ( method_exists( $class_name, 'set_event_factory' ) ) {
			$response->set_event_factory( new Event\Factory() );
		}

		return $response;
	}
}
