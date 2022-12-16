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

namespace Automattic\Domain_Services\Response\Contact;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response containing the Contact_Information associated with a Contact_Id.
 */
class Details implements Response\Response_Interface {
	use Response\Data_Trait;

	public const CONTACT_INFORMATION = 'data.contact_information';
	public const VALIDATED = 'data.validated';
	public const VERIFIED = 'data.verified';

	/**
	 * @return Entity\Contact_Information
	 * @throws \ReflectionException
	 */
	public function get_contact_information(): Entity\Contact_Information {
		$contact_information_data = $this->get_data_by_key( self::CONTACT_INFORMATION );
		return Entity\Contact_Information::from_array( $contact_information_data );
	}

	/**
	 * @return bool
	 */
	public function is_validated(): bool {
		return $this->get_data_by_key( self::VALIDATED );
	}

	/**
	 * @return bool
	 */
	public function is_verified(): bool {
		return $this->get_data_by_key( self::VERIFIED );
	}
}
