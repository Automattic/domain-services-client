<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity, Exception};

class Check implements Command\Command_Interface {
	use Command\Command_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * List of domains to check for availability.
	 *
	 * @var Entity\Domain_Names $domains
	 */
	private Entity\Domain_Names $domains;

	public function __construct( Entity\Domain_Names $domains ) {
		if ( 0 === count( $domains->get_domain_names() ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( 'domains', 'At least one domain name must be provided.' );
		}
		$this->domains = $domains;
	}

	/**
	 * @return Entity\Domain_Names
	 */
	public function get_domains(): Entity\Domain_Names {
		return $this->domains;
	}

	public static function get_name(): string {
		return 'Domain_Check';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domains()->to_array(),
		];
	}
}
