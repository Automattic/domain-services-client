<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response;

trait Data_Trait {
	private array $data;

	final public function __construct( array $data = [] ) {
		$this->data = $data;
	}

	/**
	 * @param string $key
	 * @return array|mixed|null
	 */
	final public function get_data_by_key( string $key ) {
		$key_parts = explode( '.', $key );
		$data = $this->data;
		foreach ( $key_parts as $key_part ) {
			$data = $data[ $key_part ] ?? null;
		}
		return $data;
	}

	/**
	 * @return int
	 */
	final public function get_status(): int {
		return $this->get_data_by_key( 'status' );
	}

	/**
	 * @return string
	 */
	final public function get_status_description(): string {
		return $this->get_data_by_key( 'status_description' );
	}

	/**
	 * @return bool
	 */
	final public function is_success(): bool {
		return $this->get_data_by_key( 'success' );
	}

	/**
	 * @return string
	 */
	final public function get_client_txn_id(): string {
		return $this->get_data_by_key( 'client_txn_id' );
	}

	/**
	 * @return string
	 */
	final public function get_server_txn_id(): string {
		return $this->get_data_by_key( 'server_txn_id' );
	}

	/**
	 * @return int
	 */
	final public function get_timestamp(): int {
		return $this->get_data_by_key( 'timestamp' );
	}

	/**
	 * @return float
	 */
	final public function get_runtime(): float {
		return $this->get_data_by_key( 'runtime' );
	}
}
