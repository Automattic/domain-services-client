<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Event_Trait {
	final public static function get_event_date_end_array_key(): string {
		return 'date_end';
	}

	final public static function get_event_date_start_array_key(): string {
		return 'date_start';
	}

	final public static function get_event_filter_array_key(): string {
		return 'filter';
	}

	final public static function get_event_first_array_key(): string {
		return 'first';
	}

	final public static function get_event_id_array_key(): string {
		return 'event_id';
	}

	final public static function get_event_limit_array_key(): string {
		return 'limit';
	}

	final public static function get_event_show_acknowledged_array_key(): string {
		return 'show_acknowledged';
	}
}
