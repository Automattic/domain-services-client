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

namespace Automattic\Domain_Services_Client\Response\Email\Send;

use Automattic\Domain_Services_Client\{Entity,Response};

/**
 * Response of an `Email\Send\Auth_Code` command.
 *
 * @see \Automattic\Domain_Services_Client\Command\Email\Send\Auth_Code
 */
class Auth_Code implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Gets the email of the domain owner (the email to which the code was sent)
	 *
	 * @return Entity\Email_Address|null
	 * @throws \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception
	 */
	public function get_email(): ?Entity\Email_Address {
		var_dump("\n\n**********\n\n");
		var_dump( $this->get_data_by_key( 'data.email' ) );
		var_dump("\n\n**********\n\n");
		$email = $this->get_data_by_key( 'data.email' ) ?? null;
		return $email ? new Entity\Email_Address( $email ) : null;
	}
}
