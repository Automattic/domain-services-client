<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Exception;

use Automattic\Domain_Services\{Response};

class Error implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_invalid_option(): ?string {
		return $this->get_data_by_key( 'invalid_option' );
	}

	public function get_reason(): ?string {
		return $this->get_data_by_key( 'reason' );
	}

	public function get_command(): ?string {
		return $this->get_data_by_key( 'command_data.command' );
	}

	public function get_command_params(): ?array {
		return $this->get_data_by_key( 'command_data.params' );
	}
}
