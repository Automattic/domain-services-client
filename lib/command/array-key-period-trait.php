<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Period_Trait {
	final public static function get_period_array_key(): string {
		return 'period';
	}
}
