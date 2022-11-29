<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

interface Command_Serialize_Interface extends \JsonSerializable {
	/**
	 * Returns the command parameters as an array for use when in the jsonSerialize() method
	 *
	 * @return array
	 */
	public function to_array(): array;
}
