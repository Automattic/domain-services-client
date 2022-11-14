<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

class Contact_Verification_Data {
	/**
	 * The verification code used to verify a contact.
	 *
	 * @var string
	 */
	private string $code;

	public function __construct( string $code ) {
		$this->code = $code;
	}

	/**
	 * @return string
	 */
	public function get_code(): string {
		return $this->code;
	}
}
