<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\Response;

class Check implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Gets the availability information for a list of domain from the response.
	 *
	 * @return array
	 */
	public function get_domains(): array {
		return $this->get_data_by_key( 'data.domains' ) ?? [];
	}
}
