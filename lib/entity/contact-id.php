<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

class Contact_Id implements Entity_Interface {
	private string $provider_id;
	private string $provider_contact_id;

	public function __construct( string $contact_id ) {
		$contact_id_parts = explode( ':', $contact_id, 2 );
		$this->provider_id = $contact_id_parts[0];
		$this->provider_contact_id = $contact_id_parts[1];

		if ( ! in_array( $this->provider_id, Entity_Interface::VALID_PROVIDER_IDS, true ) ) {
			throw new Exception\Command\Invalid_Format_Exception( 'Invalid contact ID prefix' );
		}
	}

	private static function build_string( string $provider_id, string $provider_contact_id ): string {
		return $provider_id . ':' . $provider_contact_id;
	}

	public function __toString(): string {
		return self::build_string( $this->provider_id, $this->provider_contact_id );
	}

	public static function build_for_provider( string $provider_id, string $provider_contact_id ): self {
		return new self( self::build_string( $provider_id, $provider_contact_id ) );
	}

	/**
	 * @return string
	 */
	public function get_provider_id(): string {
		return $this->provider_id;
	}

	/**
	 * @return string
	 */
	public function get_provider_contact_id(): string {
		return $this->provider_contact_id;
	}
}
