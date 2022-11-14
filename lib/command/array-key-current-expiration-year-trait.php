<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Current_Expiration_Year_Trait {
	final public static function get_current_expiration_year_array_key(): string {
		return 'current_expiration_year';
	}
}
