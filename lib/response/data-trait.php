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
