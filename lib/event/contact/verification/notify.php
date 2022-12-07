<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Contact\Verification;

use Automattic\Domain_Services\{Event};

class Notify implements Event\Event_Interface {
	use Event\Data_Trait;
}
