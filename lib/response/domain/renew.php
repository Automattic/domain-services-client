<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\Response;

class Renew implements Response\Response_Interface {
	use Response\Data_Trait;

	public function get_expiration_date(): ?string {
		return $this->get_data_by_key( 'data.expiration_date' );
	}
}
