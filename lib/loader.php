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

/**
 * Domain Services API Autoloader
 *
 * Modified from code found here: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 */
spl_autoload_register(
	static function ( $class ) {

		// project-specific namespace prefix
		$prefix = 'Automattic\Domain_Services\\';

		// base directory for the namespace prefix
		$base_dir = __DIR__ . '/';

		// does the class use the namespace prefix?
		if ( stripos( $class, $prefix ) !== 0 ) {
			// no, move to the next registered autoloader
			return;
		}

		// get the relative class name
		$len = strlen( $prefix );
		$relative_class = substr( $class, $len );
		$relative_class = strtolower( str_replace( '_', '-', $relative_class ) );

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php
		$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

		// if the file exists, require it
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);
