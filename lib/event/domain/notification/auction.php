<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Notification;

use Automattic\Domain_Services\{Entity, Event};

class Auction implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	/**
	 * This should be one of PARKED, SUBMITTED, ACTIVE
	 *
	 * @return string|null
	 */
	public function get_auction_status(): ?string {
		return $this->get_data_by_key( 'event_data.auction_status' );
	}

	/**
	 * This is the date at which the domain will exit the current auction state
	 *
	 * @return \DateTimeImmutable|null
	 */
	public function get_auction_status_end_date(): ?\DateTimeImmutable {
		$auction_state_end_date = $this->get_data_by_key( 'event_data.auction_status_end_date' );

		if ( null === $auction_state_end_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $auction_state_end_date );
	}
}
