<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Event_Trait {
	final public static function get_event_limit_array_key(): string {
		return 'limit';
	}
}
