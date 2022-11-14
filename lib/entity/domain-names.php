<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

class Domain_Names {
	/**
	 * The list of domain names.
	 *
	 * @var Domain_Name[]
	 */
	private array $domain_names;

	public function __construct( Domain_Name ...$domain_names ) {
		$this->domain_names = $domain_names;
	}

	/**
	 * @return Domain_Name[]
	 */
	public function get_domain_names(): array {
		return $this->domain_names;
	}

	public function to_array(): array {
		return array_map(
			static fn( $domain_name ) => $domain_name->get_name(),
			$this->get_domain_names()
		);
	}
}
