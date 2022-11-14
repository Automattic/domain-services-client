<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

class Whois_Privacy {
	public const DISCLOSE_CONTACT_INFO = 'disclose_contact_info';
	public const REDACT_CONTACT_INFO = 'redact_contact_info';
	public const ENABLE_PRIVACY_SERVICE = 'enable_privacy_service';

	private const VALID_PRIVACY_SETTINGS = [
		self::DISCLOSE_CONTACT_INFO,
		self::REDACT_CONTACT_INFO,
		self::ENABLE_PRIVACY_SERVICE,
	];

	/**
	 * The whois privacy setting for a domain
	 *
	 * @var string
	 */
	private string $setting;

	public function __construct( string $setting ) {
		if ( ! in_array( $setting, self::VALID_PRIVACY_SETTINGS ) ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'Invalid whois privacy setting' );
		}

		$this->setting = $setting;
	}

	/**
	 * @return string
	 */
	public function get_setting(): string {
		return $this->setting;
	}

	public function to_scalar(): string {
		return $this->get_setting();
	}
}
