<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Contact;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response containing the Contact_Information associated with a Contact_Id.
 */
class Details implements Response\Response_Interface {
	use Response\Data_Trait;

	public const CONTACT_INFORMATION = 'data.contact_information';
	public const VALIDATED = 'data.validated';
	public const VERIFIED = 'data.verified';

	/**
	 * @return Entity\Contact_Information
	 * @throws \ReflectionException
	 */
	public function get_contact_information(): Entity\Contact_Information {
		$contact_information_data = $this->get_data_by_key( self::CONTACT_INFORMATION );
		return Entity\Contact_Information::from_array( $contact_information_data );
	}

	/**
	 * @return bool
	 */
	public function is_validated(): bool {
		return $this->get_data_by_key( self::VALIDATED );
	}

	/**
	 * @return bool
	 */
	public function is_verified(): bool {
		return $this->get_data_by_key( self::VERIFIED );
	}
}
