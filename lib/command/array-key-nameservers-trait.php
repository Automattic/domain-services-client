<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Nameservers_Trait {
	final public static function get_nameservers_array_key(): string {
		return 'nameservers';
	}
}
