<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Privacy_Setting_Trait {
	final public static function get_privacy_setting_array_key(): string {
		return 'privacy_setting';
	}
}
