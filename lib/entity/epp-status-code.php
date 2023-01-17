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

namespace Automattic\Domain_Services_Client\Entity;

use Automattic\Domain_Services_Client\{Exception};

/**
 * A class that represents an EPP status code
 *
 * @link: https://www.icann.org/resources/pages/epp-status-codes-2014-06-16-en
 */
class Epp_Status_Code {
	// These are the EPP statuses we can add/delete.
	public const CLIENT_DELETE_PROHIBITED = 'clientDeleteProhibited';
	public const CLIENT_HOLD = 'clientHold';
	public const CLIENT_RENEW_PROHIBITED = 'clientRenewProhibited';
	public const CLIENT_TRANSFER_PROHIBITED = 'clientTransferProhibited';
	public const CLIENT_UPDATE_PROHIBITED = 'clientUpdateProhibited';

	// These EPP statuses are only readable
	public const ADD_PERIOD = 'addPeriod';
	public const AUTO_RENEW_PERIOD = 'autoRenewPeriod';
	public const INACTIVE = 'inactive';
	public const OK = 'ok';
	public const PENDING_CREATE = 'pendingCreate';
	public const PENDING_DELETE = 'pendingDelete';
	public const PENDING_RENEW = 'pendingRenew';
	public const PENDING_RESTORE = 'pendingRestore';
	public const PENDING_TRANSFER = 'pendingTransfer';
	public const PENDING_UPDATE = 'pendingUpdate';
	public const REDEMPTION_PERIOD = 'redemptionPeriod';
	public const RENEW_PERIOD = 'renewPeriod';
	public const SERVER_DELETE_PROHIBITED = 'serverDeleteProhibited';
	public const SERVER_HOLD = 'serverHold';
	public const SERVER_RENEW_PROHIBITED = 'serverRenewProhibited';
	public const SERVER_TRANSFER_PROHIBITED = 'serverTransferProhibited';
	public const SERVER_UPDATE_PROHIBITED = 'serverUpdateProhibited';
	public const TRANSFER_PERIOD = 'transferPeriod';

	private const READ_ONLY = 'read_only';
	private const READ_WRITE = 'read_write';

	public const VALID_EPP_STATUSES = [
		self::CLIENT_DELETE_PROHIBITED => self::READ_WRITE,
		self::CLIENT_HOLD => self::READ_WRITE,
		self::CLIENT_RENEW_PROHIBITED => self::READ_WRITE,
		self::CLIENT_TRANSFER_PROHIBITED => self::READ_WRITE,
		self::CLIENT_UPDATE_PROHIBITED => self::READ_WRITE,
		self::ADD_PERIOD => self::READ_ONLY,
		self::AUTO_RENEW_PERIOD => self::READ_ONLY,
		self::INACTIVE => self::READ_ONLY,
		self::OK => self::READ_ONLY,
		self::PENDING_CREATE => self::READ_ONLY,
		self::PENDING_DELETE => self::READ_ONLY,
		self::PENDING_RENEW => self::READ_ONLY,
		self::PENDING_RESTORE => self::READ_ONLY,
		self::PENDING_TRANSFER => self::READ_ONLY,
		self::PENDING_UPDATE => self::READ_ONLY,
		self::REDEMPTION_PERIOD => self::READ_ONLY,
		self::RENEW_PERIOD => self::READ_ONLY,
		self::SERVER_DELETE_PROHIBITED => self::READ_ONLY,
		self::SERVER_HOLD => self::READ_ONLY,
		self::SERVER_RENEW_PROHIBITED => self::READ_ONLY,
		self::SERVER_TRANSFER_PROHIBITED => self::READ_ONLY,
		self::SERVER_UPDATE_PROHIBITED => self::READ_ONLY,
		self::TRANSFER_PERIOD => self::READ_ONLY,
	];

	/**
	 * The EPP status code
	 *
	 * @var string
	 */
	private string $status;

	/**
	 * Constructs an EPP status code entity
	 *
	 * @param string $status
	 *
	 * @throws \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( string $status ) {
		if ( ! isset( self::VALID_EPP_STATUSES[ $status ] ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( strtolower( __CLASS__ ), $status );
		}

		$this->status = $status;
	}

	/**
	 * Returns the string representation of the EPP status code object.
	 *
	 * @internal
	 *
	 * @return string
	 */
	public function __toString(): string {
		return $this->status;
	}

	/**
	 * Checks whether the EPP status is updateable
	 *
	 * @return bool
	 */
	public function is_updateable(): bool {
		return self::READ_WRITE === self::VALID_EPP_STATUSES[ $this->status ];
	}
}
