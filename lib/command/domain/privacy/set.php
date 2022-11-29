<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain\Privacy;

use Automattic\Domain_Services\{Command, Entity};

/**
 * Sets the privacy option that determines what contact information is shown in the response of a whois query for this domain.
 */
class Set implements Command\Command_Interface, Command\Command_Serialize_Interface {
	use Command\Command_Trait, Command\Command_Serialize_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Privacy_Setting_Trait;

	/**
	 * The domain that will be updated.
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The privacy setting to use for this domain.
	 *
	 * @var Entity\Whois_Privacy
	 */
	private Entity\Whois_Privacy $privacy_setting;

	public function __construct( Entity\Domain_Name $domain, Entity\Whois_Privacy $privacy_setting ) {
		$this->domain = $domain;
		$this->privacy_setting = $privacy_setting;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return Entity\Whois_Privacy
	 */
	public function get_privacy_setting(): Entity\Whois_Privacy {
		return $this->privacy_setting;
	}

	public static function get_name(): string {
		return 'Domain_Privacy_Set';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_privacy_setting_array_key() => $this->get_privacy_setting()->get_setting(),
		];
	}
}
