<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Dns_Record_Sets_Trait {
	final public static function get_dns_record_sets_array_key(): string {
		return 'record_sets';
	}
}
