<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Command;

use Automattic\Domain_Services\{Exception, Response};

class Invalid_Command_Exception extends Exception\Domain_Services_Exception {
	public function __construct() {
		parent::__construct( Response\Code::INVALID_COMMAND_NAME, [] );
	}
}
