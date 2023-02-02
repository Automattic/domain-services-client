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

namespace Automattic\Domain_Services_Client\Event\Domain\Restore;

use Automattic\Domain_Services_Client\{Event};

/**
 * Failure event for a `Domain\Restore` command
 *
 * This event is sent when a restore operation fails. There may be more information about the cause of the failure in
 * the event data.
 *
 * @see \Automattic\Domain_Services_Client\Command\Domain\Restore
 */
class Fail implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Error_Trait;
	use Event\Object_Type_Domain_Trait;
}
