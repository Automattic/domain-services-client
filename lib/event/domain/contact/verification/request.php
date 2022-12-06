<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Contact\Verification;

use Automattic\Domain_Services\{Event};

class Request implements Event\Event_Interface {
	use Event\Data_Trait;
}
