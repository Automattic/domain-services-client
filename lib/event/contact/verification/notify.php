<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Contact\Verification;

use Automattic\Domain_Services\{Event};

/**
 * This event indicates a change in the contact status
 */
class Notify implements Event\Event_Interface {
	use Event\Data_Trait;

	/**
	 * Returns tha verification status of the contact.
	 *
	 * @return bool
	 */
	public function is_verified(): bool {
		return $this->get_data_by_key( 'event_data.verified' ) ?? false;
	}
}
