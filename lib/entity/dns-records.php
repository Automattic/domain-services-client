<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Command};

class Dns_Records {
	use Command\Array_Key_Domain_Trait, Command\Array_Key_Dns_Record_Sets_Trait;

	/**
	 * The domain name that the DNS records apply to.
	 *
	 * @var Domain_Name
	 */
	private Domain_Name $domain;

	/**
	 * The list of DNS records for this domain.
	 *
	 * @var Dns_Record_Sets
	 */
	private Dns_Record_Sets $record_sets;

	public function __construct( Domain_Name $domain, Dns_Record_Sets $record_sets ) {
		$this->domain = $domain;
		$this->record_sets = $record_sets;
	}

	/**
	 * @return Domain_Name
	 */
	public function get_domain(): Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Dns_Record_Sets
	 */
	public function get_record_sets(): Dns_Record_Sets {
		return $this->record_sets;
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->domain->get_name(),
			self::get_dns_record_sets_array_key() => $this->record_sets->to_array(),
		];
	}

	public static function from_array( string $domain_name_data, array $record_sets_data ): self {
		$domain_name = new Domain_Name( $domain_name_data );
		$dns_record_sets = Dns_Record_Sets::from_array( $record_sets_data );

		return new self( $domain_name, $dns_record_sets );
	}
}
