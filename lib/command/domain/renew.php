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

namespace Automattic\Domain_Services\Command\Domain;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Renews a domain
 *
 * - This command renews a domain for a specified number of years
 * - The required parameters are:
 *     - domain_name - the domain to renew
 *     - period - number of years to renew the domain
 *     - current_expiration_year - in which year the domain is currently going to expire (used to prevent unwanted multiple renewals)
 * - Optional parameter:
 *     - fee_amount - used when renewing premium domains because they have special pricing
 * - Runs asynchronously on the server
 * - Reseller will receive a Domain\Renew\Success or Domain\Renew\Fail event depending on the result of the command
 *
 * @see \Automattic\Domain_Services\Response\Domain\Renew
 * @see \Automattic\Domain_Services\Event\Domain\Renew\Success
 * @see \Automattic\Domain_Services\Event\Domain\Renew\Fail
 */
class Renew implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Period_Trait, Command\Array_Key_Current_Expiration_Year_Trait, Command\Array_Key_Fee_Amount_Trait;

	/**
	 * The domain name to renew
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The amount of years you want to renew the domain.
	 * (Optional, defaults to 1)
	 *
	 * @var int
	 */
	private int $period;

	/**
	 * The current expiration year of the domain. If the domain is in auto renew grace period (a specified number of calendar
	 * days following an auto-renewal), please use the previous expiration. This will prevent unintended two year renewals.
	 *
	 * @var int
	 */
	private int $current_expiration_year;

	/**
	 * Amount of the fee extension.
	 * (Optional, use it only for premium domains).
	 *
	 * @var float|null
	 */
	private ?float $fee_amount;

	/**
	 * @param Entity\Domain_Name $domain
	 * @param int $current_expiration_year
	 * @param int $period
	 * @param float|null $fee_amount
	 */
	public function __construct( Entity\Domain_Name $domain, int $current_expiration_year, int $period = 1, ?float $fee_amount = null ) {
		$this->domain = $domain;
		$this->period = $period;
		$this->current_expiration_year = $current_expiration_year;
		$this->fee_amount = $fee_amount;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return int
	 */
	public function get_period(): int {
		return $this->period;
	}

	/**
	 * @return int
	 */
	public function get_current_expiration_year(): int {
		return $this->current_expiration_year;
	}

	/**
	 * @return float|null
	 */
	public function get_fee_amount(): ?float {
		return $this->fee_amount;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Domain_Renew';
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_period_array_key() => $this->get_period(),
			self::get_current_expiration_year_array_key() => $this->get_current_expiration_year(),
			self::get_fee_amount_array_key() => $this->get_fee_amount(),
		];
	}
}
