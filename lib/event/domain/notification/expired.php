<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Notification;

use Automattic\Domain_Services\{Event};

class Expired implements Event\Event_Interface {
	use Event\Data_Trait;
}
