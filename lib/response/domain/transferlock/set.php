<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response\Domain\Transferlock;

use Automattic\Domain_Services\Response;

/**
 * Response of a set transfer lock command.
 *
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;
}
