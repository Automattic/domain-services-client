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

namespace Automattic\Domain_Services_Client\Test\Entity;

use Automattic\Domain_Services_Client\{Entity, Test};

class EPP_Status_Code_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	/**
	 * <status>, <is_updateable>
	 */
	public const ICANN_EPP_STATUSES = [
		'clientDeleteProhibited' => true,
		'clientHold' => true,
		'clientRenewProhibited' => true,
		'clientTransferProhibited' => true,
		'clientUpdateProhibited' => true,
		'addPeriod' => false,
		'autoRenewPeriod' => false,
		'inactive' => false,
		'ok' => false,
		'pendingCreate' => false,
		'pendingDelete' => false,
		'pendingRenew' => false,
		'pendingRestore' => false,
		'pendingTransfer' => false,
		'pendingUpdate' => false,
		'redemptionPeriod' => false,
		'renewPeriod' => false,
		'serverDeleteProhibited' => false,
		'serverHold' => false,
		'serverRenewProhibited' => false,
		'serverTransferProhibited' => false,
		'serverUpdateProhibited' => false,
		'transferPeriod' => false,
	];

	public function test_entity_instance_success_disclose_all(): void {
		foreach ( self::ICANN_EPP_STATUSES as $status => $is_updateable ) {
			$entity = new Entity\Epp_Status_Code( $status );
			$this->assertSame( $status, (string) $entity );
			$this->assertSame( $is_updateable, $entity->is_updateable() );
			$this->assertTrue( $entity->is_icann_status() );
		}
	}

	public function test_entity_instance_fail(): void {
		$entity = new Entity\Epp_Status_Code( 'Non-standard EPP code' );
		$this->assertFalse( $entity->is_icann_status() );
	}
}
