<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\{Entity, Response};

class Renew implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_expiration_date(): ?\DateTimeImmutable {
		$expiration_date = $this->get_data_by_key( 'data.expiration_date' );
		return null === $expiration_date ? null : \DateTimeImmutable::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $expiration_date );
	}
}
