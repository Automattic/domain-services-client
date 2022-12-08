<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event\Domain\Transfer\In;

use Automattic\Domain_Services\{Entity, Event};

class Fail implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait, Event\Transfer_Trait;
}
