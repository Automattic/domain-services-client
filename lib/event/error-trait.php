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

namespace Automattic\Domain_Services_Client\Event;

/**
 * Trait that specifies methods common to all error event classes.
 */
trait Error_Trait {

	/**
	 * Gets additional information about the reason for the error.
	 *
	 * The format will be an array of arrays:
	 *    [
	 *        [
	 *            'description' => 'A description of an error',
	 *            'extra' => [
	 *                'extra_info_example_1' => 'some additional information about this error',
	 *        ],
	 *        [
	 *            'description' => 'A description of another error',
	 *            'extra' => [
	 *                'extra_info_example_2' => 'some additional information about this error',
	 *                'extra_info_example_3' => 'even more additional information about this error',
	 *            ],
	 *        ],
	 *    ]
	 *
	 * @return array[]
	 */
	final public function get_event_errors(): array {
		return $this->get_data_by_key( 'event_data.errors' );
	}
}
