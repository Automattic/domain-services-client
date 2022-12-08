<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Privacy\Set;

use Automattic\Domain_Services\{Entity, Event, Exception};

class Success implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	/**
	 * Returns the Whois_Privacy setting that for this domain, if available
	 *
	 * @return Entity\Whois_Privacy|null
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_privacy_setting(): ?Entity\Whois_Privacy {
		$privacy_setting_data = $this->get_data_by_key( 'event_data.privacy_setting' );

		if ( null === $privacy_setting_data ) {
			return null;
		}

		return new Entity\Whois_Privacy( $privacy_setting_data );
	}
}
