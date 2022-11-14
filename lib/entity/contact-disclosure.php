<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

/**
 * The list of domain contact fields to disclose in the Whois results
 */
class Contact_Disclosure {
	public const NONE = 'none';
	public const ALL = 'all';

	public const VALID_DISCLOSURE_SETTINGS = [
		self::NONE,
		self::ALL,
	];

	/**
	 * The contact fields to disclose.
	 *
	 * @var string
	 */
	private string $disclose_fields;

	/**
	 * @param string $disclose_fields The fields to disclose in whois responses
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public function __construct( string $disclose_fields ) {
		if ( ! in_array( $disclose_fields, self::VALID_DISCLOSURE_SETTINGS, true ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid disclosure fields selected.' );
		}

		$this->disclose_fields = $disclose_fields;
	}

	/**
	 * Generate the contact disclosure fields based on the given whois privacy settings.
	 *
	 * @param Whois_Privacy $whois_privacy
	 * @return static
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public static function build_from_whois_privacy( Whois_Privacy $whois_privacy ): self {
		if ( Whois_Privacy::DISCLOSE_CONTACT_INFO === $whois_privacy->get_setting() ) {
			return new self( self::ALL );
		}

		if ( in_array( $whois_privacy->get_setting(), [ Whois_Privacy::ENABLE_PRIVACY_SERVICE, Whois_Privacy::REDACT_CONTACT_INFO ], true ) ) {
			return new self( self::NONE );
		}

		throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'No corresponding contact disclosure value for the given whois privacy setting' );
	}

	/**
	 * Get the disclosed fields as a comma delimited list.
	 *
	 * @return string
	 */
	public function get_disclose_fields(): string {
		return $this->disclose_fields;
	}

	/**
	 * Get the disclosed fields as a comma delimited list.
	 *
	 * @return string
	 */
	public function __toString(): string {
		return $this->get_disclose_fields();
	}
}
