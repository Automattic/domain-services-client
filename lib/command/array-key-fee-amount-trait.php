<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Fee_Amount_Trait {
	final public static function get_fee_amount_array_key(): string {
		return 'fee_amount';
	}
}
