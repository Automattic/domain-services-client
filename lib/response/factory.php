<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response;

use Automattic\Domain_Services\{Command, Event, Exception};

class Factory {
	public function build_response( Command\Command_Interface $command, array $response ): Response_Interface {
		if ( false === $response['success'] ) {
			throw new Exception\Domain_Services_Exception( $response['status'], $response );
		}

		$class_name = $command::get_name();

		if ( empty( $class_name ) ) {
			throw new Exception\Command\Missing_Option_Exception( 'command_name' );
		}

		$class_name = str_replace( '_', '\\', $class_name );

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
