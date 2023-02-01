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

namespace Automattic\Domain_Services_Client\Event;

use Automattic\Domain_Services_Client\{Helper};

trait Transfer_Trait {
	final public function get_current_registrar(): ?string {
		return $this->get_data_by_key( 'event_data.current_registrar' );
	}

	final public function get_requesting_registrar(): ?string {
		return $this->get_data_by_key( 'event_data.requesting_registrar' );
	}

	final public function get_auto_nack(): ?bool {
		return $this->get_data_by_key( 'event_data.auto_nack' );
	}

	final public function get_request_date(): ?\DateTimeImmutable {
		$request_date = $this->get_data_by_key( 'event_data.request_date' );
		return null === $request_date ? null : Helper\Date_Time::createImmutable( $request_date );
	}

	final public function get_execute_date(): ?\DateTimeImmutable {
		$execute_date = $this->get_data_by_key( 'event_data.execute_date' );
		return null === $execute_date ? null : Helper\Date_Time::createImmutable( $execute_date );
	}

	final public function get_transfer_status(): ?string {
		return $this->get_data_by_key( 'event_data.transfer_status' );
	}
}
