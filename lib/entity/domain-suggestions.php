<?php declare( strict_types=1 );
/*
 * Copyright (c) 2023 Automattic, Inc.
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

namespace Automattic\Domain_Services_Client\Entity;

/**
 * List of `Suggestion` entities
 *
 * Used in the `Domain\Suggestions` response.
 *
 * @see \Automattic\Domain_Services_Client\Entity\Suggestion
 * @see \Automattic\Domain_Services_Client\Response\Domain\Suggestions
 */
class Suggestions {
	/**
	 * List of `Suggestion` entities
	 *
	 * @var Suggestion[]
	 */
	private array $suggestions = [];

	/**
	 * Constructs a `Suggestions` entity
	 *
	 * @param Suggestion ...$suggestions
	 */
	public function __construct( Suggestion ...$suggestions ) {
		$this->suggestions = $suggestions;
	}

	/**
	 * Adds a new `Suggestion` to the list of suggestions
	 *
	 * @param Suggestion $suggestion
	 * @return $this
	 */
	public function add_suggestion( Suggestion $suggestion ): self {
		$this->suggestions[] = $suggestion;

		return $this;
	}

	/**
	 * Returns the suggestions array
	 *
	 * @return Suggestions[]
	 */
	public function get_suggestions(): array {
		return $this->suggestions;
	}

	/**
	 * Returns an array containing this entity's domain name suggestions
	 *
	 * @internal
	 * @return array
	 */
	public function to_array(): array {
		$suggestions = [];
		foreach ( $this->suggestions as $suggestion ) {
			$suggestions[] = $suggestion->to_array();
		}
		return [ 'suggestions' => $suggestions ];
	}
}
