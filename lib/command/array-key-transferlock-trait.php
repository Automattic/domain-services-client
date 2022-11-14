<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Transferlock_Trait {
	final public static function get_transferlock_array_key(): string {
		return 'transferlock';
	}
}
