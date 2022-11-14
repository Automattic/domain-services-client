<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Dns\Records;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Retrieves all DNS records associated with a domain.
 */
class Get implements Command\Command_Interface {
	use Command\Command_Trait, Command\Array_Key_Domain_Trait;

	private Entity\Domain_Name $domain;

	/**
	 * @param Entity\Domain_Name $domain
	 */
	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Dns_Records_Get';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
		];
	}
}
