<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Command_Trait {
	private string $client_txn_id = '';

	/**
	 * Implements the JsonSerializable interface
	 *
	 * @return array
	 */
	final public function jsonSerialize(): array { //phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
		return [
			Command_Interface::COMMAND => [
				Command_Interface::PARAMS => $this->to_array(),
			],
			Command_Interface::CLIENT_TXN_ID => $this->get_client_txn_id(),
		];
	}

	/**
	 * @return string
	 */
	final public function get_resource_path(): string {
		return '/' . strtolower( self::get_name() );
	}

	/**
	 * @return string
	 */
	final public function get_client_txn_id(): string {
		return $this->client_txn_id;
	}

	/**
	 * @param string $client_txn_id
	 */
	final public function set_client_txn_id( string $client_txn_id ): void {
		$this->client_txn_id = $client_txn_id;
	}
}
