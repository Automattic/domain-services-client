<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Contact_Disclosure_Trait {
	final public static function get_contact_disclosure_array_key(): string {
		return 'contact_disclosure';
	}
}
