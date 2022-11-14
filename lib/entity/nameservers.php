<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

class Nameservers {
	/**
	 * A list of name servers for a domain name.
	 * All names in the list must be unique.
	 * There must be a minimum of two name servers and a maximum of 12.
	 *
	 * @var Domain_Name[]
	 */
	private array $nameservers = [];

	public function __construct( Domain_Name ...$nameservers ) {
		if ( count( $nameservers ) < 2 ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have at least two nameservers' );
		}

		if ( count( $nameservers ) > 12 ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have at no more than 12 nameservers' );
		}

		foreach ( $nameservers as $nameserver ) {
			$this->add_nameserver( $nameserver );
		}
	}

	public function add_nameserver( Domain_Name $nameserver ): void {
		if ( 12 === count( $this->nameservers ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have at no more than 12 nameservers' );
		}

		if ( isset( $this->nameservers[ $nameserver->get_name() ] ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must have unique nameserver names' );
		}

		$this->nameservers[ $nameserver->get_name() ] = $nameserver;
	}

	public function to_array(): array {
		$nameserver_names = [];
		foreach ( $this->nameservers as $domain_name ) {
			$nameserver_names[] = $domain_name->get_name();
		}

		return $nameserver_names;
	}
}
