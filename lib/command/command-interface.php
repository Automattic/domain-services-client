<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

interface Command_Interface {
	public const COMMAND = 'command';
	public const PARAMS = 'params';
	public const CLIENT_TXN_ID = 'client_txn_id';

	/**
	 * Returns the command name that can be used to build command data
	 *
	 * @return string
	 */
	public static function get_name(): string;

	/**
	 * Gets the client transaction ID
	 *
	 * @return string
	 */
	public function get_client_txn_id(): string;

	/**
	 * Sets the client transaction ID
	 *
	 * @param string $client_txn_id
	 * @return void
	 */
	public function set_client_txn_id( string $client_txn_id ): void;
}
