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

namespace Automattic\Domain_Services_Client;

class Configuration {
	public const BOOLEAN_FORMAT_INT = 'int';
	public const BOOLEAN_FORMAT_STRING = 'string';

	/**
	 * @var Configuration|null
	 */
	private static ?self $default_configuration = null;

	/**
	 * Associative array to store API key(s)
	 *
	 * @var string[]
	 */
	private array $api_keys = [];

	/**
	 * Associative array to store API prefix (e.g. Bearer)
	 *
	 * @var string[]
	 */
	private array $api_key_prefixes = [];

	/**
	 * Access token for OAuth/Bearer authentication
	 *
	 * @var string
	 */
	private string $access_token = '';

	/**
	 * Boolean format for query string
	 *
	 * @var string
	 */
	private string $boolean_format_for_query_string = self::BOOLEAN_FORMAT_INT;

	/**
	 * Username for HTTP basic authentication
	 *
	 * @var string
	 */
	private string $username = '';

	/**
	 * Password for HTTP basic authentication
	 *
	 * @var string
	 */
	private string $password = '';

	/**
	 * The host
	 *
	 * @var string
	 */
	private string $host = 'https://public-api.wordpress.com/rest/v1/domain-services/reseller/command';

	/**
	 * User agent of the HTTP request
	 *
	 * @var string
	 */
	private string $user_agent = 'Automattic/Domain-Services/1.0.0/PHP';

	/**
	 * Debug switch (default set to false)
	 *
	 * @var bool
	 */
	private bool $debug = false;

	/**
	 * Debug file location (log to STDOUT by default)
	 *
	 * @var string
	 */
	private string $debug_file = 'php://output';

	/**
	 * Debug file location (log to STDOUT by default)
	 *
	 * @var string|null
	 */
	private static ?string $temp_folder_path;

	/**
	 * Sets API key
	 *
	 * @param string $api_key_identifier API key identifier (authentication scheme)
	 * @param string $key                API key or token
	 *
	 * @return $this
	 */
	public function set_api_key( string $api_key_identifier, string $key ): self {
		$this->api_keys[ $api_key_identifier ] = $key;

		return $this;
	}

	/**
	 * Gets API key
	 *
	 * @param string $api_key_identifier API key identifier (authentication scheme)
	 *
	 * @return null|string API key or token
	 */
	public function get_api_key( string $api_key_identifier ): ?string {
		return $this->api_keys[ $api_key_identifier ] ?? null;
	}

	/**
	 * Sets the prefix for API key (e.g. Bearer)
	 *
	 * @param string $api_key_identifier API key identifier (authentication scheme)
	 * @param string $prefix             API key prefix, e.g. Bearer
	 *
	 * @return $this
	 */
	public function set_api_key_prefix( string $api_key_identifier, string $prefix ): self {
		$this->api_key_prefixes[ $api_key_identifier ] = $prefix;

		return $this;
	}

	/**
	 * Gets API key prefix
	 *
	 * @param string $api_key_identifier API key identifier (authentication scheme)
	 *
	 * @return null|string
	 */
	public function get_api_key_prefix( string $api_key_identifier ): ?string {
		return $this->api_key_prefixes[ $api_key_identifier ] ?? null;
	}

	/**
	 * Sets the access token for OAuth
	 *
	 * @param string $access_token Token for OAuth
	 *
	 * @return $this
	 */
	public function set_access_token( string $access_token ): self {
		$this->access_token = $access_token;

		return $this;
	}

	/**
	 * Gets the access token for OAuth
	 *
	 * @return string Access token for OAuth
	 */
	public function get_access_token(): string {
		return $this->access_token;
	}

	/**
	 * Sets boolean format for query string.
	 *
	 * @param string $boolean_format_for_query_string Boolean format for query string
	 *
	 * @return $this
	 */
	public function set_boolean_format_for_query_string( string $boolean_format_for_query_string ): self {
		$this->boolean_format_for_query_string = $boolean_format_for_query_string;

		return $this;
	}

	/**
	 * Gets boolean format for query string.
	 *
	 * @return string Boolean format for query string
	 */
	public function get_boolean_format_for_query_string(): string {
		return $this->boolean_format_for_query_string;
	}

	/**
	 * Sets the username for HTTP basic authentication
	 *
	 * @param string $username Username for HTTP basic authentication
	 *
	 * @return $this
	 */
	public function set_username( string $username ): self {
		$this->username = $username;

		return $this;
	}

	/**
	 * Gets the username for HTTP basic authentication
	 *
	 * @return string Username for HTTP basic authentication
	 */
	public function get_username(): string {
		return $this->username;
	}

	/**
	 * Sets the password for HTTP basic authentication
	 *
	 * @param string $password Password for HTTP basic authentication
	 *
	 * @return $this
	 */
	public function set_password( string $password ): self {
		$this->password = $password;

		return $this;
	}

	/**
	 * Gets the password for HTTP basic authentication
	 *
	 * @return string Password for HTTP basic authentication
	 */
	public function get_password(): string {
		return $this->password;
	}

	/**
	 * Sets the host
	 *
	 * @param string $host Host
	 *
	 * @return $this
	 */
	public function set_host( string $host ): self {
		$this->host = $host;

		return $this;
	}

	/**
	 * Gets the host
	 *
	 * @return string Host
	 */
	public function get_host(): string {
		return $this->host;
	}

	/**
	 * Sets the user agent of the api client
	 *
	 * @param string $user_agent the user agent of the api client
	 *
	 * @return $this
	 */
	public function set_user_agent( string $user_agent ): self {
		$this->user_agent = $user_agent;

		return $this;
	}

	/**
	 * Gets the user agent of the api client
	 *
	 * @return string user agent
	 */
	public function get_user_agent(): string {
		return $this->user_agent;
	}

	/**
	 * Sets debug flag
	 *
	 * @param bool $debug Debug flag
	 *
	 * @return $this
	 */
	public function set_debug( bool $debug ): self {
		$this->debug = $debug;

		return $this;
	}

	/**
	 * Gets the debug flag
	 *
	 * @return bool
	 */
	public function get_debug(): bool {
		return $this->debug;
	}

	/**
	 * Sets the debug file
	 *
	 * @param string $debug_file Debug file
	 *
	 * @return $this
	 */
	public function set_debug_file( string $debug_file ): self {
		$this->debug_file = $debug_file;

		return $this;
	}

	/**
	 * Gets the debug file
	 *
	 * @return string
	 */
	public function get_debug_file(): string {
		return $this->debug_file;
	}

	/**
	 * Sets the temp folder path
	 *
	 * @param string $temp_folder_path Temp folder path
	 *
	 * @return $this
	 */
	public function set_temp_folder_path( string $temp_folder_path ): self {
		self::$temp_folder_path = $temp_folder_path;

		return $this;
	}

	/**
	 * Gets the temp folder path
	 *
	 * @return string Temp folder path
	 */
	public static function get_temp_folder_path(): string {
		if ( null === self::$temp_folder_path ) {
			self::$temp_folder_path = sys_get_temp_dir();
		}

		return self::$temp_folder_path;
	}

	/**
	 * Gets the default configuration instance
	 *
	 * @return Configuration
	 */
	public static function get_default_configuration(): self {
		if ( self::$default_configuration === null ) {
			self::$default_configuration = new self();
		}

		return self::$default_configuration;
	}

	/**
	 * Sets the default configuration instance
	 *
	 * @param Configuration $config An instance of the Configuration Object
	 *
	 * @return void
	 */
	public static function set_default_configuration( Configuration $config ): void {
		self::$default_configuration = $config;
	}

	/**
	 * Gets the essential information for debugging
	 *
	 * @return string The report for debugging
	 */
	public static function to_debug_report(): string {
		$report = 'PHP SDK (Domain Services) Debug Report:' . PHP_EOL;
		$report .= '    OS: ' . php_uname() . PHP_EOL;
		$report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
		$report .= '    Temp Folder Path: ' . self::get_temp_folder_path() . PHP_EOL;

		return $report;
	}

	/**
	 * Get API key (with prefix if set)
	 *
	 * @param string $api_key_identifier name of apikey
	 *
	 * @return null|string API key with the prefix
	 */
	public function get_api_key_with_prefix( string $api_key_identifier ): ?string {
		$prefix = $this->get_api_key_prefix( $api_key_identifier );
		$api_key = $this->get_api_key( $api_key_identifier );

		if ( $api_key === null ) {
			return null;
		}

		if ( $prefix === null ) {
			$key_with_prefix = $api_key;
		} else {
			$key_with_prefix = $prefix . ' ' . $api_key;
		}

		return $key_with_prefix;
	}

	/**
	 * Returns an array of host settings
	 *
	 * @return array an array of host settings
	 */
	public function get_host_settings(): array {
		return [
			[
				'url' => $this->get_host(),
				'description' => 'Automattic domain services host',
			],
		];
	}

	/**
	 * Returns URL based on host settings, index and variables
	 *
	 * @param array      $host_settings array of host settings, generated from getHostSettings() or equivalent from the
	 *                                  API clients
	 * @param int        $host_index    index of the host settings
	 * @param array|null $variables     hash of variable and the corresponding value (optional)
	 * @return string URL based on host settings
	 */
	public static function get_host_string( array $host_settings, int $host_index, ?array $variables = null ): string {
		if ( null === $variables ) {
			$variables = [];
		}

		// check array index out of bound
		if ( $host_index < 0 || $host_index >= count( $host_settings ) ) {
			throw new \InvalidArgumentException( "Invalid index $host_index when selecting the host. Must be less than " . count( $host_settings ) );
		}

		$host = $host_settings[ $host_index ];
		$url = $host['url'];

		// go through variable and assign a value
		foreach ( $host['variables'] ?? [] as $name => $variable ) {
			if ( array_key_exists( $name, $variables ) ) { // check to see if it's in the variables provided by the user
				if ( ! isset( $variable['enum_values'] ) || in_array( $variables[ $name ], $variable['enum_values'], true ) ) { // check to see if the value is in the enum
					$url = str_replace( '{' . $name . '}', $variables[ $name ], $url );
				} else {
					throw new \InvalidArgumentException( "The variable `$name` in the host URL has invalid value " . $variables[ $name ] . ". Must be " . implode( ',', $variable['enum_values'] ) . '.' );
				}
			} else {
				// use default value
				$url = str_replace( '{' . $name . '}', $variable['default_value'], $url );
			}
		}

		return $url;
	}

	/**
	 * Returns URL based on the index and variables
	 *
	 * @param int        $index     index of the host settings
	 * @param array|null $variables hash of variable and the corresponding value (optional)
	 * @return string URL based on host settings
	 */
	public function get_host_from_settings( int $index, array $variables = null ): string {
		return self::get_host_string( $this->get_host_settings(), $index, $variables );
	}
}
