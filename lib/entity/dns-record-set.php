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

namespace Automattic\Domain_Services_Client\Entity;

/**
 * A set of DNS records that share the same name, type and TTL
 */
class Dns_Record_Set {

	private const NAME = 'name';
	private const TYPE = 'type';
	private const TTL = 'ttl';
	private const DATA = 'data';

	/**
	 * The name field of this DNS record
	 *
	 * @var string
	 */
	private string $name;

	/**
	 * The type of this DNS record
	 *
	 * @var Dns_Record_Type
	 */
	private Dns_Record_Type $type;

	/**
	 * The Time To Live in seconds for the DNS record
	 *
	 * @var int
	 */
	private int $ttl;

	/**
	 * The data of this DNS record
	 *
	 * @var array
	 */
	private array $data;

	/**
	 * Constructs a Dns_Record_Set entity
	 *
	 * @param string          $name
	 * @param Dns_Record_Type $type
	 * @param int             $ttl
	 * @param array           $data
	 */
	public function __construct( string $name, Dns_Record_Type $type, int $ttl, array $data ) {
		$this->name = $name;
		$this->type = $type;
		$this->ttl = $ttl;
		$this->data = $data;
	}

	/**
	 * Returns the name of this DNS record set
	 *
	 * @return string
	 */
	public function get_name(): string {
		return $this->name;
	}

	/**
	 * Returns the type of this DNS record set
	 *
	 * @return Dns_Record_Type
	 */
	public function get_type(): Dns_Record_Type {
		return $this->type;
	}

	/**
	 * Returns the TTL of this DNS record set
	 *
	 * @return int
	 */
	public function get_ttl(): int {
		return $this->ttl;
	}

	/**
	 * Returns the data of this DNS record set
	 *
	 * @return array
	 */
	public function get_data(): array {
		return $this->data;
	}

	/**
	 * Returns a string representation of this DNS record set
	 *
	 * @internal
	 * @return string
	 */
	public function __toString() {
		return $this->name . ' ' . $this->ttl . ' ' . $this->type . ' ' . implode( ', ', $this->data );
	}

	/**
	 * Returns an associative array containing this DNS record set's values
	 *
	 * @internal
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::NAME => $this->name,
			self::TYPE => $this->type->get_type(),
			self::TTL => $this->ttl,
			self::DATA => $this->data,
		];
	}

	/**
	 * Constructs a Dns_Record_Set entity from an associative array containing a DNS record set
	 *
	 * @internal
	 * @param array $data
	 * @return static
	 * @throws \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception
	 */
	public static function from_array( array $data ): self {
		return new self(
			$data[ self::NAME ],
			new Dns_Record_Type( $data[ self::TYPE ] ),
			(int) $data[ self::TTL ],
			$data[ self::DATA ]
		);
	}
}
