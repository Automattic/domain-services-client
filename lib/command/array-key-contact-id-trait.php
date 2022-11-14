<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

trait Array_Key_Contact_Id_Trait {
	final public static function get_contact_id_array_key(): string {
		return 'contact_id';
	}
}
