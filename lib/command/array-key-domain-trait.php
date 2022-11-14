<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Domain_Trait {
	final public static function get_domain_name_array_key(): string {
		return 'domain';
	}
}
