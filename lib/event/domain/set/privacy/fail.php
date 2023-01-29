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

namespace Automattic\Domain_Services_Client\Event\Domain\Set\Privacy;

use Automattic\Domain_Services_Client\{Event};

/**
 * Fail event for a `Domain\Set\Privacy command
 *
 * This event is generated when a privacy setting update fails at the server.
 *
 * @see \Automattic\Domain_Services_Client\Command\Domain\Set\Privacy
 */
class Fail implements Event\Event_Interface {
	use Event\Data_Trait;
	use Event\Error_Trait;
	use Event\Object_Type_Domain_Trait;
}
