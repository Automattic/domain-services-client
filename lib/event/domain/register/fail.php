<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Register;

use Automattic\Domain_Services\{Event};

class Fail implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait, Event\Error_Trait;
}
