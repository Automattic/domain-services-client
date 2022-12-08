<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\{Entity};

trait Transfer_Trait {
	final public function get_current_registrar(): ?string {
		return $this->get_data_by_key( 'event_data.current_registrar' );
	}

	final public function get_requesting_registrar(): ?string {
		return $this->get_data_by_key( 'event_data.requesting_registrar' );
	}

	final public function get_auto_nack(): ?bool {
		return $this->get_data_by_key( 'event_data.auto_nack' );
	}

	final public function get_request_date(): ?\DateTimeImmutable {
		$request_date = $this->get_data_by_key( 'event_data.request_date' );
		return null === $request_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $request_date );
	}

	final public function get_execute_date(): ?\DateTimeImmutable {
		$execute_date = $this->get_data_by_key( 'event_data.execute_date' );
		return null === $execute_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $execute_date );
	}

	final public function get_transfer_status(): ?string {
		return $this->get_data_by_key( 'event_data.transfer_status' );
	}
}
