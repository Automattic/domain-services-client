<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Command;

use Automattic\Domain_Services\{Exception, Response};

class Invalid_Format_Exception extends Exception\Domain_Services_Exception {
	public function __construct( string $error_detail ) {
		parent::__construct( Response\Code::INVALID_COMMAND_FORMAT, [ 'format_error' => $error_detail ] );
	}
}
