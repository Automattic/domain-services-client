<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Nameservers\Set;

use Automattic\Domain_Services\{Entity, Event, Exception};

class Success implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	/**
	 * Returns the name servers that have been set at the registry.
	 *
	 * @return Entity\Nameservers
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function get_nameservers(): ?Entity\Nameservers {
		$nameservers_data = $this->get_data_by_key( 'event_data.name_servers' );

		if ( null === $nameservers_data ) {
			return null;
		}

		$domain_names = [];
		foreach ( $nameservers_data as $domain ) {
			$domain_names[] = new Entity\Domain_Name( $domain );
		}

		return new Entity\Nameservers( ... $domain_names );
	}
}
