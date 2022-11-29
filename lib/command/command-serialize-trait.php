<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Command_Serialize_Trait {
	/**
	 * Implements the JsonSerializable interface
	 *
	 * @return array
	 */
	final public function jsonSerialize(): array { //phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
		return [
			Command_Interface::COMMAND => static::get_name(),
			Command_Interface::PARAMS => $this->to_array(),
			Command_Interface::CLIENT_TXN_ID => $this->get_client_txn_id(),
		];
	}
}
