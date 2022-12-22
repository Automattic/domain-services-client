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

namespace Automattic\Domain_Services\Response\Domain\Nameservers;

use Automattic\Domain_Services\Response;

/**
 * Response of a Domain\Nameservers\Set command
 *
 * - The name server update operation runs asynchronously at the server
 * - A success response indicates that the operation was queued, not completed
 *     - The `Domain\Nameservers\Set\Success` and `Domain\Nameservers\Set\Fail` events will indicate whether the
 *       operation was successful or not
 *
 * Example usage:
 *
 * ```
 * $domain_name = new Entity\Domain_Name( 'example-domain.com' );
 * $nameservers_array = [
 *     new Entity\Domain_Name( 'ns1.wordpress.com' ),
 *     new Entity\Domain_Name( 'ns2.wordpress.com' ),
 * ];
 * $nameservers = new Entity\Nameservers( $nameservers_array );
 * $command = new Command\Domain\Nameservers\Set( $domain_name, $nameservers );
 *
 * $response = $api->post( $command );
 *
 * if ( $response->is_success() ) {
 *     // command was issued successfully, the client should wait for a `Domain\Nameservers\Set\Success` or `Domain\Nameservers\Set\Fail event`
 * }
 * ```
 *
 * @see \Automattic\Domain_Services\Command\Domain\Nameservers\Set
 * @see \Automattic\Domain_Services\Event\Domain\Nameservers\Set\Success
 * @see \Automattic\Domain_Services\Event\Domain\Nameservers\Set\Fail
 */
class Set implements Response\Response_Interface {
	use Response\Data_Trait;
}
