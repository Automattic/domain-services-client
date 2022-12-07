<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Contact\Verification;

use Automattic\Domain_Services\{Event};

/**
 * This event indicates that a verification request was sent to the contact's email address.
 */
class Request implements Event\Event_Interface {
	use Event\Data_Trait;

	/**
	 * Returns the email address that the verification request was sent to.
	 *
	 * @return string|null
	 */
	public function get_email(): ?string {
		return $this->get_data_by_key( 'event_data.email' );
	}
}
