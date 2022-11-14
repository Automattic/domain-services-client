<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Command;

use Automattic\Domain_Services\{Exception, Response};

class Missing_Option_Exception extends Exception\Domain_Services_Exception {
	public function __construct( string $missing_option ) {
		parent::__construct( Response\Code::MISSING_COMMAND_OPTION, [ 'missing_option' => $missing_option ] );
	}
}
