<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Notification;

use Automattic\Domain_Services\{Event};

class Agp implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait;
}
