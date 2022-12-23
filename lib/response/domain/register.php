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

namespace Automattic\Domain_Services\Response\Domain;

/**
 * Response of a Domain\Register command
 *
 * Since the command runs asynchronously on the server, success response indicates that request has been queued, not
 * completed.
 *
 * @see \Automattic\Domain_Services\Command\Domain\Register
 * @see \Automattic\Domain_Services\Event\Domain\Register\Fail
 * @see \Automattic\Domain_Services\Event\Domain\Register\Success
 */

use Automattic\Domain_Services\{Response};

class Register implements Response\Response_Interface {
	use Response\Data_Trait;
}
