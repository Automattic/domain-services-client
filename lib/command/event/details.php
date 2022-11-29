<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Event;

use Automattic\Domain_Services\{Command};

/**
 * Retrieves details of an event.
 */
class Details implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Event_Trait;

	/**
	 * ID of the event whose details will be checked.
	 *
	 * @var int
	 */
	private int $event_id;

	/**
	 * @param int $event_id
	 */
	public function __construct( int $event_id ) {
		$this->event_id = $event_id;
	}

	/**
	 * @return int
	 */
	public function get_event_id(): int {
		return $this->event_id;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Event_Details';
	}

	public function to_array(): array {
		return [
			self::get_event_id_array_key() => $this->get_event_id(),
		];
	}
}
