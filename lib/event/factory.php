<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\{Exception, Response};

class Factory {
	public function build_event( array $event_data ): Event_Interface {
		$event_class = $event_data['event_class'] ?? null;
		$event_subclass = $event_data['event_subclass'] ?? null;

		if ( null === $event_class or null === $event_subclass ) {
			throw new Exception\Event\Invalid_Event_Name( 'Missing event class or subclass' );
		}

		$class_name = str_replace( '_', '\\', $event_class . '_' . $event_subclass );

		$class_name = __NAMESPACE__ . '\\' . $class_name;
		if ( ! class_exists( $class_name ) ) {
			throw new Exception\Event\Invalid_Event_Name( 'Event class does not exist: ' . $class_name );
		}

		return new $class_name( $event_data );
	}
}
