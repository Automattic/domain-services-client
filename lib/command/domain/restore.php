<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Restores (redeems) a domain that is currently in the redemption period.
 *
 * @package Automattic\Domain_Services\Command\Domain
 */
class Restore implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * @var Entity\Domain_Name domain to be restored
	 */
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
		return 'Domain_Restore';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
		];
	}
}
