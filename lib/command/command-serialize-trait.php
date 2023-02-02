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

namespace Automattic\Domain_Services_Client\Command;

/**
 * Trait used by commands that can be serialized
 */
trait Command_Serialize_Trait {
	/**
	 * Implements the `JsonSerializable` interface
	 *
	 * @internal
	 *
	 * @return array
	 */
	final public function jsonSerialize(): array { //phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
		return [
			Command_Interface::COMMAND => static::get_name(),
			Command_Interface::PARAMS => $this->to_array(),
			Command_Interface::CLIENT_TXN_ID => $this->get_client_txn_id(),
		];
	}
}
