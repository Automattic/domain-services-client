<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Retrieves information about a domain that is registered with us.
 *
 * Retrieves various information about a domain that is registered with us, such as creation and expiry dates, auth code,
 * name servers and EPP statuses. If the domain is not registered with us, the information of a Domain_Check command
 * is returned instead (domain availability and fees).
 */
class Info implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * @var Entity\Domain_Name domain which information will be retrieved
	 */
	private Entity\Domain_Name $domain;

	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	public static function get_name(): string {
		return 'Domain_Info';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
		];
	}
}
