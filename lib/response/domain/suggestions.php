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

namespace Automattic\Domain_Services\Response\Domain;

use Automattic\Domain_Services\{Entity, Response};

/**
 * Response of a Domain_Suggestions command
 *
 * @see \Automattic\Domain_Services\Command\Domain\Suggestions
 */
class Suggestions implements Response\Response_Interface {
	use Response\Data_Trait;

	/**
	 * Returns the suggestions of the response object
	 *
	 * @return Entity\Suggestions|null
	 */
	public function get_suggestions(): Entity\Suggestions {
		$suggestions_data = $this->get_data_by_key( 'data.suggestions' );

		$suggestions = new Entity\Suggestions();
		foreach ( $suggestions_data as $suggestion_data ) {
			$domain_name = new Entity\Domain_Name( $suggestion_data['name'] );
			$suggestions->add_suggestion( new Entity\Suggestion( $domain_name ) );
		}

		return $suggestions;
	}
}
