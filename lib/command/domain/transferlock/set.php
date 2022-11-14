<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Domain\Transferlock;

use Automattic\Domain_Services\{Command, Entity};

class Set implements Command\Command_Interface {
	use Command\Command_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Domain_Trait, Command\Array_Key_Transferlock_Trait;

	/**
	 * The domain name that will be updated.
	 *
	 * @var Entity\Domain_Name
	 */
	private Entity\Domain_Name $domain;

	/**
	 * The status of the transfer lock for the given domain.
	 *
	 * @var bool
	 */
	private bool $transfer_lock;

	public function __construct( Entity\Domain_Name $domain, bool $transfer_lock ) {
		$this->domain = $domain;
		$this->transfer_lock = $transfer_lock;
	}

	/**
	 * @return Entity\Domain_Name
	 */
	public function get_domain(): Entity\Domain_Name {
		return $this->domain;
	}

	/**
	 * @return bool
	 */
	public function get_transfer_lock(): bool {
		return $this->transfer_lock;
	}

	public static function get_name(): string {
		return 'Domain_Transferlock_Set';
	}

	public function to_array(): array {
		return [
			self::get_domain_name_array_key() => $this->get_domain()->get_name(),
			self::get_transferlock_array_key() => $this->get_transfer_lock(),
		];
	}
}
