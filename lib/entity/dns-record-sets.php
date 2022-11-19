<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

class Dns_Record_Sets implements \Iterator {
	/**
	 * The list of EPP status codes that apply to a single domain
	 *
	 * @var Dns_Record_Set[]
	 */
	private array $dns_record_sets = [];

	/**
	 * The current index for the iterator
	 *
	 * @var int
	 */
	private int $iterator_pointer = 0;

	public function __construct( Dns_Record_Set ...$dns_record_sets ) {
		foreach ( $dns_record_sets as $dns_record_set ) {
			$this->add_record_set( $dns_record_set );
		}
	}

	public function add_record_set( Dns_Record_Set $dns_record_set ): void {
		$this->dns_record_sets[] = $dns_record_set;
	}

	public function to_array(): array {
		$dns_record_sets = [];

		foreach ( $this->dns_record_sets as $dns_record_set ) {
			$dns_record_sets[] = $dns_record_set->to_array();
		}

		return $dns_record_sets;
	}

	public static function from_array( array $dns_record_sets_data ): self {
		$dns_record_sets = new self();

		foreach ( $dns_record_sets_data as $dns_record_set_data ) {
			$dns_record_set = Dns_Record_Set::from_array( $dns_record_set_data );
			$dns_record_sets->add_record_set( $dns_record_set );
		}

		return $dns_record_sets;
	}

	/**
	 * Functions to implement the Iterator interface
	 */
	public function current(): ?Dns_Record_Set {
		$keys = array_keys( $this->dns_record_sets );
		return $this->dns_record_sets[ $keys[ $this->iterator_pointer ] ];
	}

	public function next(): void {
		$this->iterator_pointer++;
	}

	public function key(): ?int {
		return $this->iterator_pointer;
	}

	public function valid(): bool {
		return $this->iterator_pointer < count( $this->dns_record_sets );
	}

	public function rewind(): void {
		$this->iterator_pointer = 0;
	}
}
