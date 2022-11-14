<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Provider\Automattic;

use Automattic\Domain_Services\{Exception, Response};

class Dns_Exception extends Exception\Domain_Services_Exception {
	public function __construct( \DNS_Exception $dns_exception ) {
		$code = Response\Code::COMMAND_FAILED;
		parent::__construct( $code, [ 'details' => $dns_exception->getMessage() ], $dns_exception );
	}
}
