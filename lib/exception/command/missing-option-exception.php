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

namespace Automattic\Domain_Services\Exception\Command;

use Automattic\Domain_Services\{Exception, Response};

class Missing_Option_Exception extends Exception\Domain_Services_Exception {
	/**
	 * @internal
	 */
	public function __construct( string $missing_option ) {
		parent::__construct( Response\Code::MISSING_COMMAND_OPTION, [ 'missing_option' => $missing_option ] );
	}
}
