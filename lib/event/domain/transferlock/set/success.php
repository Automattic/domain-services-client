<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Transferlock\Set;

use Automattic\Domain_Services\{Event};

class Success implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;

	public function is_locked(): bool {
		return $this->get_data_by_key( 'event_data.transferlock' ) ?? false;
	}
}
