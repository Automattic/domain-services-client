<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Dns_Records_Trait {
	final public static function get_dns_records_array_key(): string {
		return 'records';
	}
}
