<?php declare( strict_types=1 );
/*
 * Copyright (c) 2022 Automattic, Inc.
 *
 * This file is part of the Automattic Domain Services Client library.
 *
 * The Automattic Domain Services Client library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see https://www.gnu.org/licenses.
 */

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
