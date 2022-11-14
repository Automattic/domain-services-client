<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Response;

class Code {
	public const SUCCESS = 200;
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
	public const ENTITY_NOT_FOUND = 545;
	public const COMMAND_FAILED = 549;
	public const UNKNOWN_ERROR = 999;

	const DESCRIPTION = [
		self::SUCCESS => 'Command completed successfully',
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
		self::ENTITY_NOT_FOUND => 'Object not found',
	];

	public static function get_description( int $code ): string {
		return self::DESCRIPTION[ $code ] ?? 'Unknown error code';
	}
}
