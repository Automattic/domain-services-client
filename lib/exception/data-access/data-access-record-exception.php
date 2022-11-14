<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Data_Access;

use Automattic\Domain_Services\{Exception, Response};

class Data_Access_Record_Exception extends Exception\Domain_Services_Exception {
	public function __construct( string $error_detail ) {
		parent::__construct( Response\Code::COMMAND_FAILED, [ 'error' => $error_detail ] );
	}
}
