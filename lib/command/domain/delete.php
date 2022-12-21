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

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Deletes a domain
 *
 * - This command deletes a domain from your account
 * - Notes
 *     - Some TLDs might not support explicit deletion
 *     - After you delete a domain, it can be impossible to register it again
 * - Runs asynchronously on the server
 * - Reseller will receive a `Domain\Delete\Success` or `Domain\Delete\Fail` event depending on the result of the command
 *
 * @see \Automattic\Domain_Services\Response\Domain\Delete
 * @see \Automattic\Domain_Services\Event\Domain\Delete\Success
 * @see \Automattic\Domain_Services\Event\Domain\Delete\Fail
 */
class Delete implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait;

	/**
	 * The domain name to delete
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * @param Entity\Domain_Name $domain
	 */
	public function __construct( Entity\Domain_Name $domain ) {
		$this->domain = $domain;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Domain_Delete';
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
		];
	}
}
