<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Contact;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Retrieves the details of a Contact_Id.
 */
class Details implements Command\Command_Interface {
	use Command\Command_Trait;

	/**
	 * The contact ID to get details of.
	 *
	 * @var Entity\Contact_Id
	 */
	private Entity\Contact_Id $contact_id;

	/**
	 * @param Entity\Contact_Id $contact_id
	 */
	public function __construct( Entity\Contact_Id $contact_id ) {
		$this->contact_id = $contact_id;
	}

	/**
	 * @return Entity\Contact_Id
	 */
	public function get_contact_id(): Entity\Contact_Id {
		return $this->contact_id;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Contact_Details';
	}
}
