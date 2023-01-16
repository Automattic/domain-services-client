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

namespace Automattic\Domain_Services\Command\Domain\Set;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Sets the privacy option that determines what contact information is shown in WHOIS.
 *
 * - Runs asynchronously on the server
 * - Reseller will receive a Domain\Set\Privacy\Success or Domain\Set\Privacy\Fail event depending on the result of the
 * command
 *
 * Example:
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $privacy_setting = new Entity\Whois_Privacy( Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE );
 * $command = new Command\Domain\Set\Privacy( $domain, $privacy_setting );
 * $response = $api->post( $command );
 * if ( $response->is_success() ) {
 *   // the request to update the privacy setting was queued successfully
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Event\Domain\Set\Privacy\Fail
 * @see \Automattic\Domain_Services\Event\Domain\Set\Privacy\Success
 * @see \Automattic\Domain_Services\Response\Domain\Set\Privacy
 */
class Privacy implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Serialize_Trait;
	use Command\Command_Trait;

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

	/**
	 * Construct the Domain\Set\Privacy
	 *
	 * @param Entity\Domain_Name   $domain
	 * @param Entity\Whois_Privacy $privacy_setting
	 */
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

	/**
	 * @internal
	 */
	public function to_array(): array {
		return [
			Command\Command_Interface::KEY_DOMAIN => $this->get_domain()->get_name(),
			Command\Command_Interface::KEY_PRIVACY_SETTINGS => $this->get_privacy_setting()->get_setting(),
		];
	}
}
