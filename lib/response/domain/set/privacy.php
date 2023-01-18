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

namespace Automattic\Domain_Services_Client\Response\Domain\Set;

use Automattic\Domain_Services_Client\{Response};

/**
 * Response of a `Domain\Set\Privacy` command
 *
 * Since the command runs asynchronously on the server, success response indicates that request has been queued, not
 * completed.
 *
 * @see \Automattic\Domain_Services_Client\Command\Domain\Set\Privacy
 * @see \Automattic\Domain_Services_Client\Event\Domain\Set\Privacy\Success
 * @see \Automattic\Domain_Services_Client\Event\Domain\Set\Privacy\Fail
 */
class Privacy implements Response\Response_Interface {
	use Response\Data_Trait;
}
