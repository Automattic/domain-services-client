<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain\Contacts;

use Automattic\Domain_Services\{Command, Entity, Exception};

class Set implements Command\Command_Interface {
	use Command\Command_Trait, Command\Array_Key_Contacts_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The contact information that will be updated in the domain.
	 * Only the provided contact types will be updated. If a contact type is not provided, it won't be deleted.
	 *
	 * @var Entity\Domain_Contacts
	 */
	private Entity\Domain_Contacts $contacts;

	public function __construct( Entity\Domain_Name $domain, Entity\Domain_Contacts $contacts ) {
		$this->domain = $domain;

		if ( $contacts->is_empty() ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Must provide at least one contact type for update.' );
		}

		$this->contacts = $contacts;
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
	 * @return string
	 */
	public static function get_name(): string {
		return 'Domain_Contacts_Set';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_contacts_array_key() => $this->get_contacts()->to_array(),
		];
	}
}
