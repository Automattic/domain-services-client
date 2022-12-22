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

namespace Automattic\Domain_Services\Response\Domain\Contacts;

use Automattic\Domain_Services\{Event, Response, Command};

/**
 * Response for Domain\Contacts\Set command
 *
 * - The contacts set operation runs asynchronously at the server
 * - A success response indicates that the operation was queued, not completed
 * - The `Domain\Contacts\Set\Success` and `Domain\Contacts\Set\Fail` events will indicate whether the operation was successful or not
 *
 * @see Command\Domain\Contacts\Set
 * @see Event\Domain\Contacts\Set\Success
 * @see Event\Domain\Contacts\Set\Fail
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;
}
