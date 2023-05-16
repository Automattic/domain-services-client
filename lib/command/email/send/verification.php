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

namespace Automattic\Domain_Services_Client\Command\Email\Send;

use Automattic\Domain_Services_Client\{Command, Entity, Exception};

/**
 * Resend email for domain contact verification
 *
 * @see \Automattic\Domain_Services_Client\Response\Domain\Set\Contacts
 * @see Entity\Contact_Id
 * @see Entity\Contact_Information
 * @see Entity\Domain_Contacts
 * @see Entity\Domain_Contact
 */
class Verification implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Email_Address
	 */
	private Entity\Email_Address $email_address;

	/**
	 * Constructs a `Email\Send\Verification` command
	 *
	 * @param Entity\Email_Address     $domain
	 *
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( Entity\Email_Address $email_address ) {
		$this->email_address = $email_address;
	}

	/**
	 * Gets the domain name that will be updated
	 *
	 * @return Entity\Email_Address
	 */
	private function get_email_address(): Entity\Email_Address {
		return $this->email_address;
	}

	/**
	 * Converts the command to an associative array
	 *
	 * @internal
	 *
	 * @return array
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_EMAIL => $this->get_email_address()->get_email_address(),
		];
	}
}
