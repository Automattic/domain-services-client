<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain\Nameservers;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Set the nameservers for the specified domain
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Nameservers_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Domain_Name $domain
	 */
	private Entity\Domain_Name $domain;

	/**
	 * List of nameservers that will be set for the domain.
	 *
	 * @var Entity\Nameservers $nameservers
	 */
	private Entity\Nameservers $nameservers;

	/**
	 * @param Entity\Domain_Name $domain
	 * @param Entity\Nameservers $nameservers
	 */
	public function __construct( Entity\Domain_Name $domain, Entity\Nameservers $nameservers ) {
		$this->domain = $domain;
		$this->nameservers = $nameservers;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Entity\Nameservers
	 */
	public function get_nameservers(): Entity\Nameservers {
		return $this->nameservers;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Domain_Nameservers_Set';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_nameservers_array_key() => $this->get_nameservers()->to_array(),
		];
	}
}
