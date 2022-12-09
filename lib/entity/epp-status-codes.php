<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

class Epp_Status_Codes implements \Iterator {
	/**
	 * The list of EPP status codes that apply to a single domain
	 *
	 * @var Epp_Status_Code[]
	 */
	private array $epp_status_codes = [];

	/**
	 * The current index for the iterator
	 *
	 * @var int
	 */
	private int $iterator_pointer = 0;

	public function __construct( Epp_Status_Code ...$epp_status_codes ) {
		foreach ( $epp_status_codes as $epp_status_code ) {
			$this->add_epp_code( $epp_status_code );
		}
	}

	public function add_epp_code( Epp_Status_Code $epp_status_code ): void {
		// @todo where are we checking whether the EPP status is updateable or not
		$this->epp_status_codes[ (string) $epp_status_code ] = $epp_status_code;
	}

	public function to_array(): array {
		$epp_status_codes = [];

		foreach ( $this->epp_status_codes as $epp_status_code ) {
			$epp_status_codes[] = (string) $epp_status_code;
		}

		return $epp_status_codes;
	}

	/**
	 * Functions to implement the Iterator interface
	 */
	public function current(): ?Epp_Status_Code {
		$keys = array_keys( $this->epp_status_codes );
		return $this->epp_status_codes[ $keys[ $this->iterator_pointer ] ];
	}

	public function next(): void {
		$this->iterator_pointer++;
	}

	public function key(): ?int {
		return $this->iterator_pointer;
	}

	public function valid(): bool {
		return $this->iterator_pointer < count( $this->epp_status_codes );
	}

	public function rewind(): void {
		$this->iterator_pointer = 0;
	}
}
