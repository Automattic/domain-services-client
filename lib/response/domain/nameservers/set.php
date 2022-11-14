<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain\Nameservers;

use Automattic\Domain_Services\Response;

/**
 * Response of a Domain_Nameserver_Set command.
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;
}
