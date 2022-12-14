<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

class Domain_Name {
	private string $name;

	public function __construct( string $name ) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function get_name(): string {
		return $this->name;
	}

	public function __toString() {
		return $this->get_name();
	}
}
