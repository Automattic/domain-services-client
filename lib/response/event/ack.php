<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Event;

use Automattic\Domain_Services\{ Response };

/**
 * Response of an Event_Ack command.
 */
class Ack implements Response\Response_Interface {
	use Response\Data_Trait;
}
