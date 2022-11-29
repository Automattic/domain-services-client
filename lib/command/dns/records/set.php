<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Dns\Records;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Updates all DNS records associated with a domain.
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Dns_Records_Trait;

	private Entity\Dns_Records $records;

	public function __construct( Entity\Dns_Records $records ) {
		$this->records = $records;
	}

	public function get_records(): Entity\Dns_Records {
		return $this->records;
	}

	public static function get_name(): string {
		return 'Dns_Records_Set';
	}

	public function to_array(): array {
		return [
			self::get_dns_records_array_key() => $this->get_records()->to_array(),
		];
	}
}
