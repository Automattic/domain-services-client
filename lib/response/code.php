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

namespace Automattic\Domain_Services_Client\Response;

/**
 * Represents status codes and descriptions from the DSAPI command's responses
 */
class Code {
	public const SUCCESS = 200;
	public const ACCEPTED = 202;
	public const INVALID_COMMAND_NAME = 500;
	public const INVALID_COMMAND_OPTION = 501;
	public const INVALID_ENTITY_VALUE = 502;
	public const INVALID_ATTRIBUTE_NAME = 503;
	public const MISSING_REQUIRED_ATTRIBUTE = 504;
	public const INVALID_ATTRIBUTE_VALUE_SYNTAX = 505;
	public const INVALID_OPTION_VALUE = 506;
	public const INVALID_COMMAND_FORMAT = 507;
	public const MISSING_REQUIRED_ENTITY = 508;
	public const MISSING_COMMAND_OPTION = 509;
	public const SERVER_CLOSING_CONNECTION = 520;
	public const TOO_MANY_SESSIONS_OPEN = 521;
	public const AUTHENTICATION_FAILED = 530;
	public const AUTHORIZATION_FAILED = 531;
	public const INVALID_ATTRIBUTE_VALUE = 541;
	public const DOMAIN_ALREADY_REGISTERED = 554;
	public const ENTITY_NOT_FOUND = 545;
	public const COMMAND_FAILED = 549;
	public const TLD_IN_MAINTENANCE = 599;
	public const INVALID_EVENT_DATA = 600;
	public const INVALID_EVENT_NAME = 601;
	public const INVALID_VERIFICATION_DATA = 602;
	public const UNUSED_CONTACT_HANDLE = 603;
	public const INVALID_TRANSFER_REQUEST = 604;
	public const UNKNOWN_ERROR = 999;

	private const DESCRIPTION = [
		self::SUCCESS => 'Command completed successfully',
		self::ACCEPTED => 'Request has been accepted for processing',
		self::INVALID_COMMAND_NAME => 'Invalid command name',
		self::INVALID_COMMAND_OPTION => 'Invalid command option',
		self::INVALID_ENTITY_VALUE => 'Invalid entity value',
		self::INVALID_ATTRIBUTE_NAME => 'Invalid attribute name',
		self::MISSING_REQUIRED_ATTRIBUTE => 'Missing required attribute',
		self::INVALID_ATTRIBUTE_VALUE_SYNTAX => 'Invalid attribute value syntax',
		self::INVALID_OPTION_VALUE => 'Invalid option value',
		self::INVALID_COMMAND_FORMAT => 'Invalid command format',
		self::MISSING_REQUIRED_ENTITY => 'Missing required entity',
		self::MISSING_COMMAND_OPTION => 'Missing command option',
		self::SERVER_CLOSING_CONNECTION => 'Server closing connection. Client should try opening new connection',
		self::TOO_MANY_SESSIONS_OPEN => 'Too many sessions open. Server closing connection',
		self::AUTHENTICATION_FAILED => 'Authentication failed',
		self::AUTHORIZATION_FAILED => 'Authorization failed',
		self::INVALID_ATTRIBUTE_VALUE => 'Invalid attribute value',
		self::ENTITY_NOT_FOUND => 'Entity not found',
		self::COMMAND_FAILED => 'Command failed',
		self::UNKNOWN_ERROR => 'Unknown error',
		self::DOMAIN_ALREADY_REGISTERED => 'Domain already registered',
		self::TLD_IN_MAINTENANCE => 'Domain TLD currently in maintenance',
		self::INVALID_EVENT_DATA => 'Invalid event data',
		self::INVALID_EVENT_NAME => 'Invalid event name',
		self::INVALID_VERIFICATION_DATA => 'Invalid verification data',
		self::INVALID_TRANSFER_REQUEST => 'Domain transfer cannot be initiated',
		self::UNUSED_CONTACT_HANDLE => 'Contact hanlde not linked with a domain',
	];

	/**
	 * Gets the description of a status code
	 *
	 * @param int $code
	 *
	 * @return string
	 */
	public static function get_description( int $code ): string {
		return self::DESCRIPTION[ $code ] ?? 'Unknown error code';
	}
}
