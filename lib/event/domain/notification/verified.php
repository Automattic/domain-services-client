<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Notification;

use Automattic\Domain_Services\{Event};

class Verified implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	/**
	 * Returns information about the reason the domain is verified, if available.
	 *
	 * @return string|null
	 */
	public function get_info(): ?string {
		return $this->get_data_by_key( 'event_data.info' );
	}
}
