<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response;

use Automattic\Domain_Services\{Event};

trait Event_Aware {
	protected Event\Factory $event_factory;

	/**
	 * @param Event\Factory $event_factory
	 * @return void
	 */
	public function set_event_factory( Event\Factory $event_factory ): void {
		$this->event_factory = $event_factory;
	}

	/**
	 * @return Event\Factory
	 */
	public function get_event_factory(): Event\Factory {
		return $this->event_factory;
	}
}
