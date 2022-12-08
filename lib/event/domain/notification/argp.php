<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Notification;

use Automattic\Domain_Services\{Entity, Event};

class Argp implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	public function get_argp_end_date(): ?\DateTimeImmutable {
		$argp_end_date = $this->get_data_by_key( 'event_data.argp_end_date' ) ?? null;

		if ( null === $argp_end_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $argp_end_date );
	}
}
