<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Exception;

use Automattic\Domain_Services\{Response};

class Domain_Services_Exception extends \Exception {
	private array $data;

	public function __construct( int $code, array $data, \Throwable $previous = null ) {
		$this->data = $data;
		parent::__construct( Response\Code::get_description( $code ), $code, $previous );
	}

	public function get_exception_type(): array {
		return [
			'class' => null,
			'subclass' => 'Domain_Services',
		];
	}

	public function get_error_data(): array {
		return $this->data;
	}
}
