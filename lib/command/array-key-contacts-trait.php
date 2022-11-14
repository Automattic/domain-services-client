<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Contacts_Trait {
	final public static function get_contacts_array_key(): string {
		return 'contacts';
	}
}
