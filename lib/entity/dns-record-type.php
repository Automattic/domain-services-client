<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

class Dns_Record_Type {
	public const A = 'A';
	public const AAAA = 'AAAA';
	public const ALIAS = 'ALIAS';
	public const CAA = 'CAA';
	public const CNAME = 'CNAME';
	public const MX = 'MX';
	public const NS = 'NS';
	public const PTR = 'PTR';
	public const TXT = 'TXT';
	public const SOA = 'SOA';
	public const SRV = 'SRV';

	public const VALID_RECORD_TYPES = [
		self::A,
		self::AAAA,
		self::ALIAS,
		self::CAA,
		self::CNAME,
		self::MX,
		self::NS,
		self::PTR,
		self::TXT,
		self::SOA,
		self::SRV,
	];

	/**
	 * The DNS record type.
	 *
	 * @var string
	 */
	private string $type;

	public function __construct( string $type ) {
		if ( ! in_array( $type, self::VALID_RECORD_TYPES ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__ );
		}

		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function get_type(): string {
		return $this->type;
	}
}
