<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test\Entity;

use Automattic\Domain_Services\{Entity, Exception, Response, Test};

class EPP_Status_Code_Test extends Test\Lib\Domain_Services_Client_Test_Case {
	/**
	 * <status>, <is_updateable>
	 */
	public const VALID_EPP_STATUSES = [
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
		foreach ( self::VALID_EPP_STATUSES as $status => $is_updateable ) {
			$entity = new Entity\Epp_Status_Code( $status );
			$this->assertSame( $status, (string) $entity );
			$this->assertSame( $is_updateable, $entity->is_updateable() );
		}
	}

	public function test_entity_instance_fail(): void {
		$this->expectException( Exception\Entity\Invalid_Value_Exception::class );
		$this->expectExceptionCode( Response\Code::INVALID_ENTITY_VALUE );
		$this->expectExceptionMessage( Response\Code::get_description( Response\Code::INVALID_ENTITY_VALUE ) );
		new Entity\Epp_Status_Code( 'INVALID' );
	}
}
