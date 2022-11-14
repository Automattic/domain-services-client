<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Command;

use Automattic\Domain_Services\{Exception, Response};

class Invalid_Response_Exception extends Exception\Domain_Services_Exception {
	public function __construct( int $code, array $data ) {
		parent::__construct( $code, $data );
	}
}
