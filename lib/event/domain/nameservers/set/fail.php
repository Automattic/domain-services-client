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

namespace Automattic\Domain_Services\Event\Domain\Nameservers\Set;

use Automattic\Domain_Services\{Event};

/**
 * Set name servers failure event
 *
 * This event is generated when a `Domain\Nameservers\Set` command fails.
 *
 * @see \Automattic\Domain_Services\Command\Domain\Nameservers\Set
 */
class Fail implements Event\Event_Interface {
	use Event\Data_Trait, Event\Object_Type_Domain_Trait, Event\Error_Trait;
}
