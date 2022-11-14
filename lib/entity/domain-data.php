<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\Persistence;

class Domain_Data implements Persistence\Entity_Interface {
	public const TABLE_NAME = 'dsapi_domains';
	public const COLUMN_ID = 'dsapi_domain_id';
	public const COLUMN_DOMAIN_NAME = 'domain_name';
	public const COLUMN_EXPIRY_DATE = 'expiry_date';
	public const COLUMN_PAID_UNTIL = 'paid_until';
	public const COLUMN_CREATED_DATE = 'created_date';
	public const COLUMN_LAST_UPDATED = 'last_updated';
	public const COLUMN_STATUS = 'status';
	public const COLUMN_CONTACT_VERIFICATION_STATUS = 'contact_verification_status';
	public const COLUMN_REGISTRAR = 'registrar';
	public const COLUMN_RESELLER_KEY = 'reseller_key';
	public const COLUMN_PREMIUM = 'premium';
	public const COLUMN_DOMAIN_PRICING_KEY = 'domain_pricing_key';

	private ?int $dsapi_domain_id;
	private Domain_Name $name;
	private \DateTimeImmutable $expiry_date;
	private \DateTimeImmutable $paid_until;
	private \DateTimeImmutable $created_date;
	private \DateTimeImmutable $last_updated;
	private string $status;
	private string $contact_verification_status;
	private string $registrar;
	private string $reseller_key;
	private bool $premium;
	private string $domain_pricing_key;

	public function __construct( ?int $dsapi_domain_id, Domain_Name $name, \DateTimeImmutable $expiry_date, \DateTimeImmutable $paid_until, \DateTimeImmutable $created_date, \DateTimeImmutable $last_updated, string $status, string $contact_verification_status, string $registrar, string $reseller_key, bool $premium, string $domain_pricing_key ) {
		$this->dsapi_domain_id = $dsapi_domain_id;
		$this->name = $name;
		$this->expiry_date = $expiry_date;
		$this->paid_until = $paid_until;
		$this->created_date = $created_date;
		$this->last_updated = $last_updated;
		$this->status = $status;
		$this->contact_verification_status = $contact_verification_status;
		$this->registrar = $registrar;
		$this->reseller_key = $reseller_key;
		$this->premium = $premium;
		$this->domain_pricing_key = $domain_pricing_key;
	}

	/**
	 * @return int|null
	 */
	public function get_id(): ?int {
		return $this->dsapi_domain_id;
	}

	/**
	 * @return Domain_Name
	 */
	public function get_name(): Domain_Name {
		return $this->name;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function get_expiry_date(): \DateTimeImmutable {
		return $this->expiry_date;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function get_paid_until(): \DateTimeImmutable {
		return $this->paid_until;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function get_created_date(): \DateTimeImmutable {
		return $this->created_date;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function get_last_updated(): \DateTimeImmutable {
		return $this->last_updated;
	}

	/**
	 * @return string
	 */
	public function get_status(): string {
		return $this->status;
	}

	/**
	 * @return string
	 */
	public function get_contact_verification_status(): string {
		return $this->contact_verification_status;
	}

	/**
	 * @return string
	 */
	public function get_registrar(): string {
		return $this->registrar;
	}

	/**
	 * @return string
	 */
	public function get_reseller_key(): string {
		return $this->reseller_key;
	}

	/**
	 * @return bool
	 */
	public function is_premium(): bool {
		return $this->premium;
	}

	/**
	 * @return string
	 */
	public function get_domain_pricing_key(): string {
		return $this->domain_pricing_key;
	}

	/**
	 * @param \DateTimeImmutable $expiry_date
	 */
	public function set_expiry_date( \DateTimeImmutable $expiry_date ): void {
		$this->expiry_date = $expiry_date;
	}

	/**
	 * @param \DateTimeImmutable $paid_until
	 */
	public function set_paid_until( \DateTimeImmutable $paid_until ): void {
		$this->paid_until = $paid_until;
	}

	/**
	 * @param string $status
	 */
	public function set_status( string $status ): void {
		$this->status = $status;
	}

	/**
	 * @param string $contact_verification_status
	 */
	public function set_contact_verification_status( string $contact_verification_status ): void {
		$this->contact_verification_status = $contact_verification_status;
	}

	/**
	 * @param string $domain_pricing_key
	 */
	public function set_domain_pricing_key( string $domain_pricing_key ): void {
		$this->domain_pricing_key = $domain_pricing_key;
	}

	public static function from_array( array $data ): self {
		return new self(
			(int) $data[ self::COLUMN_ID ],
			new Domain_Name( $data[ self::COLUMN_DOMAIN_NAME ] ),
			new \DateTimeImmutable( $data[ self::COLUMN_EXPIRY_DATE ] ),
			new \DateTimeImmutable( $data[ self::COLUMN_PAID_UNTIL ] ),
			new \DateTimeImmutable( $data[ self::COLUMN_CREATED_DATE ] ),
			new \DateTimeImmutable( $data[ self::COLUMN_LAST_UPDATED ] ),
			$data[ self::COLUMN_STATUS ],
			$data[ self::COLUMN_CONTACT_VERIFICATION_STATUS ],
			$data[ self::COLUMN_REGISTRAR ],
			$data[ self::COLUMN_RESELLER_KEY ],
			(bool) $data[ self::COLUMN_PREMIUM ],
			$data[ self::COLUMN_DOMAIN_PRICING_KEY ],
		);
	}

	public function to_array(): array {
		return [
			self::COLUMN_ID => (string) $this->get_id(),
			self::COLUMN_DOMAIN_NAME => $this->get_name()->get_name(),
			self::COLUMN_EXPIRY_DATE => $this->get_expiry_date()->format( Entity_Interface::DATE_FORMAT ),
			self::COLUMN_PAID_UNTIL => $this->get_paid_until()->format( Entity_Interface::DATE_FORMAT ),
			self::COLUMN_CREATED_DATE => $this->get_created_date()->format( Entity_Interface::DATE_FORMAT ),
			self::COLUMN_LAST_UPDATED => $this->get_last_updated()->format( Entity_Interface::DATE_FORMAT ),
			self::COLUMN_STATUS => $this->get_status(),
			self::COLUMN_CONTACT_VERIFICATION_STATUS => $this->get_contact_verification_status(),
			self::COLUMN_REGISTRAR => $this->get_registrar(),
			self::COLUMN_RESELLER_KEY => $this->get_reseller_key(),
			self::COLUMN_PREMIUM => $this->is_premium(),
			self::COLUMN_DOMAIN_PRICING_KEY => $this->get_domain_pricing_key(),
		];
	}

	public static function get_fields(): array {
		return [
			self::COLUMN_ID,
			self::COLUMN_DOMAIN_NAME,
			self::COLUMN_EXPIRY_DATE,
			self::COLUMN_PAID_UNTIL,
			self::COLUMN_CREATED_DATE,
			self::COLUMN_LAST_UPDATED,
			self::COLUMN_STATUS,
			self::COLUMN_CONTACT_VERIFICATION_STATUS,
			self::COLUMN_REGISTRAR,
			self::COLUMN_RESELLER_KEY,
			self::COLUMN_PREMIUM,
			self::COLUMN_DOMAIN_PRICING_KEY,
		];
	}
}
