<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Entity;

use Automattic\Domain_Services\{Exception, Response};

class Invalid_Value_Exception extends Exception\Domain_Services_Exception {
	public function __construct( string $invalid_option, string $reason = '' ) {
		parent::__construct( Response\Code::INVALID_ENTITY_VALUE, [ 'invalid_option' => $invalid_option, 'reason' => $reason ] );
	}
}
