<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity, Exception};

class Register implements Command\Command_Interface {
	use Command\Command_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Contacts_Trait;

	/**
	 * The domain name to register
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The contact informaiton to use when registering this domain.
	 *
	 * @var Entity\Domain_Contacts
	 */
	private Entity\Domain_Contacts $contacts;

	/**
	 * The number of years to register this domain for.
	 * (Optional, defaults to 1.)
	 *
	 * @var int
	 */
	private int $period;

	/**
	 * The nameservers to set for this domain once it is registered.
	 * (Optional, defaults to WordPress.com name servers.)
	 *
	 * @var Entity\Nameservers|null
	 */
	private Entity\Nameservers $nameservers;

	/**
	 * The DNS records to set for this domain, if using WordPress.com nameservers.
	 * (Optional, defaults to no records.)
	 *
	 * @var Entity\Dns_Records
	 */
	private ?Entity\Dns_Records $dns_records;

	/**
	 * The Whois privacy setting to use for this domain.
	 * (Optional, defaults to "a8c_privacy_service" which uses the Knock Knock Whois Not There privacy service.)
	 *
	 * @var string
	 */
	private string $privacy_setting;

	/**
	 * The price of the domain.
	 * (Only used when registering a premium domain. Defaults to null.)
	 *
	 * @var int|null
	 */
	private ?int $price;

	public function __construct( Entity\Domain_Name $domain, Entity\Domain_Contacts $contacts, int $period = 1, Entity\Nameservers $nameservers = null, Entity\Dns_Records $dns_records = null, string $privacy_setting = 'a8c_privacy_service', ?int $price = null ) {
		if ( null === $nameservers ) {
			$nameservers = new Entity\Nameservers(
				new Entity\Domain_Name( 'ns1.wordpress.com' ),
				new Entity\Domain_Name( 'ns2.wordpress.com' ),
				new Entity\Domain_Name( 'ns3.wordpress.com' ),
			);
		}

		$this->domain = $domain;
		if ( null === $contacts->get_owner() ) {
			throw new Exception\Entity\Invalid_Value_Exception( 'contacts', 'The owner contact information cannot be null.' );
		}
		$this->contacts = $contacts;
		$this->period = $period;
		$this->nameservers = $nameservers;
		$this->dns_records = $dns_records;
		$this->privacy_setting = $privacy_setting;
		$this->price = $price;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Entity\Domain_Contacts
	 */
	public function get_contacts(): Entity\Domain_Contacts {
		return $this->contacts;
	}

	/**
	 * @return int
	 */
	public function get_period(): int {
		return $this->period;
	}

	/**
	 * @return Entity\Nameservers
	 */
	public function get_nameservers(): Entity\Nameservers {
		return $this->nameservers;
	}

	/**
	 * @return ?Entity\Dns_Records
	 */
	public function get_dns_records(): ?Entity\Dns_Records {
		return $this->dns_records;
	}

	/**
	 * @return string
	 */
	public function get_privacy_setting(): string {
		return $this->privacy_setting;
	}

	/**
	 * @return int|null
	 */
	public function get_price(): ?int {
		return $this->price;
	}

	public static function get_name(): string {
		return 'Domain_Register';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_contacts_array_key() => $this->get_contacts()->to_array(),
		];
	}
}
