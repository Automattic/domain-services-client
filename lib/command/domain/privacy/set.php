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

namespace Automattic\Domain_Services\Command\Domain\Privacy;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Sets the privacy option that determines what contact information is shown in the response of a whois query for this domain.
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Privacy_Setting_Trait;

	/**
	 * The domain that will be updated.
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The privacy setting to use for this domain.
	 *
	 * @var Entity\Whois_Privacy
	 */
	private Entity\Whois_Privacy $privacy_setting;

	public function __construct( Entity\Domain_Name $domain, Entity\Whois_Privacy $privacy_setting ) {
		$this->domain = $domain;
		$this->privacy_setting = $privacy_setting;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Entity\Whois_Privacy
	 */
	public function get_privacy_setting(): Entity\Whois_Privacy {
		return $this->privacy_setting;
	}

	public static function get_name(): string {
		return 'Domain_Privacy_Set';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_privacy_setting_array_key() => $this->get_privacy_setting()->get_setting(),
		];
	}
}
