<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

use Automattic\Domain_Services\{Exception};

class Factory {
	public function process_command( Context $context ): Command_Interface {
		$command_data = $context->get_command_data();

		$class_name = $command_data[ Command_Interface::COMMAND ] ?? '';

		if ( empty( $class_name ) ) {
			throw new Exception\Command\Missing_Option_Exception( Command_Interface::COMMAND );
		}

		$class_name = str_replace( '_', '\\', $class_name );

		if ( ! empty( $command_data[ Command_Interface::PARAMS ] ) && ! is_array( $command_data[ Command_Interface::PARAMS ] ) ) {
			throw new Exception\Command\Invalid_Format_Exception( 'Command parameters must be array' );
		}

		if ( ! empty( $command_data['auth'] ) && ! is_array( $command_data['auth'] ) ) {
			throw new Exception\Command\Invalid_Format_Exception( 'Auth data must be an array' );
		}

		$context->set_client_txn_id( $command_data[ Command_Interface::CLIENT_TXN_ID ] ?? '' );

		// TODO: authenticate the customer and verify the permissions

		$class_name = __NAMESPACE__ . '\\' . $class_name;
		if ( ! class_exists( $class_name ) ) {
			throw new Exception\Command\Invalid_Command_Exception();
		}

		$interfaces = class_implements( $class_name, true );
		if ( ! isset( $interfaces[ Command_Interface::class ] ) ) {
			throw new Exception\Command\Invalid_Command_Exception();
		}

		$params = $command_data[ Command_Interface::PARAMS ] ?? [];

		return $this->build_command_object( $class_name, $params );
	}

	private function build_command_object( $class_name, $params ): Command_Interface {
		return $this->get_named_parameters_instance( $class_name, $params, Command_Interface::COMMAND );
	}

	public function get_named_parameters_instance( $class_name, $params, $parent_name ) {
		$ref_class = new \ReflectionClass( $class_name );
		$ref_class_constructor = $ref_class->getConstructor();
		$ref_params = ( null === $ref_class_constructor ) ? [] : $ref_class_constructor->getParameters();

		if ( is_array( $params ) && ! $this->is_named_params( $params ) ) {
			if ( ! empty( $ref_params ) && $ref_params[0]->isVariadic() ) {
				// If the next params are variadic build the list of arguments from the param class type
				$variadic_ref_param_class_name = $ref_params[0]->getClass()->getName();
				$variadic_params = [];
				foreach ( $params as $param_value ) {
					$variadic_param_value = is_array( $param_value ) ? $param_value : [ $param_value ];
					$variadic_params[] = $this->get_named_parameters_instance( $variadic_ref_param_class_name, $variadic_param_value, $class_name );
				}

				return new $class_name( ...$variadic_params );
			} else {
				// If the array can't be considered as named params ( aka non-associative array ), then pass the array as is to the constructor.
				return new $class_name( ...$params );
			}
		}

		$call_params = [];
		foreach ( $ref_params as $parameter ) {
			if ( is_array( $params ) && array_key_exists( $parameter->getName(), $params ) ) {
				$param_value = $params[ $parameter->getName() ];
			} elseif ( $parameter->isOptional() ) {
				$param_value = $parameter->getDefaultValue();
			} else {
				throw new Exception\Command\Missing_Option_Exception( $parent_name . ' ' . $parameter->getName() );
			}

			$parameter_class = $parameter->getClass();
			if (
				! $parameter_class
				|| ( $parameter->allowsNull() && null === $param_value )
				|| ( is_object( $param_value ) && get_class( $param_value ) === $parameter_class->getName() )
			) {
				// A scalar constructor argument, or a nullable argument, nothing to instantiate
				$call_params[] = $param_value;

				continue;
			}

			if ( ! is_array( $param_value ) ) {
				// If the constructor argument is NOT scalar and the value is not an array, wrap it in an array
				$param_value = [ $param_value ];
			}

			if ( $parameter->isVariadic() ) {
				foreach ( $param_value as $variadic_param_value ) {
					$call_params[] = $this->get_named_parameters_instance( $parameter_class->getName(), $variadic_param_value, $class_name );
				}

				continue;
			}

			$call_params[] = $this->get_named_parameters_instance( $parameter_class->getName(), $param_value, $parameter->getName() );
		}

		return new $class_name( ...$call_params );
	}

	/**
	 * Checks if the provided array can be treated as named parameters
	 *
	 * @param array $values
	 *
	 * @return bool
	 */
	private function is_named_params( array $values ): bool {
		return is_string( array_key_first( $values ) );
	}
}
