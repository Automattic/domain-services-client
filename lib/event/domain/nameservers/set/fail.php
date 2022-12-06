<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Nameservers\Set;

use Automattic\Domain_Services\{Event};

class Fail implements Event\Event_Interface {
	use Event\Data_Trait;
}
