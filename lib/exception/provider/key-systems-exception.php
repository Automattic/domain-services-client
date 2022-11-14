<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception\Provider;

use Automattic\Domain_Services\{Exception, Response};

class Key_Systems_Exception extends Exception\Domain_Services_Exception {
	public function __construct( \Key_Systems\Key_Systems_Exception $ks_exception ) {
		$code = $ks_exception->data[ \Key_Systems\Key_Systems_Exception::RESPONSE ][ \Key_Systems\API\Response::CODE ] ?? Response\Code::UNKNOWN_ERROR;
		parent::__construct( $code, [], $ks_exception );
	}
}
