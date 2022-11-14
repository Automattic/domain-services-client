<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

/**
 * A set of DNS records that share the same name, type and TTL.
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

	public function __construct( string $name, Dns_Record_Type $type, int $ttl, array $data ) {
		$this->name = $name;
		$this->type = $type;
		$this->ttl = $ttl;
		$this->data = $data;
	}

	/**
	 * @return string
	 */
	public function get_name(): string {
		return $this->name;
	}

	/**
	 * @return Dns_Record_Type
	 */
	public function get_type(): Dns_Record_Type {
		return $this->type;
	}

	/**
	 * @return int
	 */
	public function get_ttl(): int {
		return $this->ttl;
	}

	/**
	 * @return array
	 */
	public function get_data(): array {
		return $this->data;
	}

	public function __toString() {
		return $this->name . ' ' . $this->ttl . ' ' . $this->type . ' ' . implode( ', ', $this->data );
	}

	public function to_array(): array {
		return [
			self::NAME => $this->name,
			self::TYPE => $this->type->get_type(),
			self::TTL => $this->ttl,
			self::DATA => $this->data,
		];
	}

	public static function from_array( array $data ): self {
		return new self(
			$data[ self::NAME ],
			new Dns_Record_Type( $data[ self::TYPE ] ),
			(int) $data[ self::TTL ],
			$data[ self::DATA ]
		);
	}
}
