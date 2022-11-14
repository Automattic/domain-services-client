<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Persistence};

class Reseller implements Persistence\Entity_Interface {
	public const TABLE_NAME = 'dsapi_resellers';

	public const COLUMN_ID = 'dsapi_reseller_id';
	public const COLUMN_RESELLER_KEY = 'reseller_key';
	public const COLUMN_RESELLER_NAME = 'reseller_name';
	public const COLUMN_SERVICE_PROVIDER_NAME = 'service_provider_name';
	public const COLUMN_SERVICE_PROVIDER_ACCOUNT = 'service_provider_account';
	public const COLUMN_SERVICE_PROVIDER_OPMODE = 'service_provider_opmode';
	public const COLUMN_STATUS = 'status';
	public const COLUMN_AUTH_TYPE = 'auth_type';
	public const COLUMN_AUTH_USER = 'auth_user';
	public const COLUMN_AUTH_DATA = 'auth_data';

	private ?int $id;
	private string $key;
	private string $name;
	private string $service_provider_name;
	private string $service_provider_account;
	private string $service_provider_opmode;
	private string $status;
	private string $auth_type;
	private string $auth_user;
	private string $auth_data;

	/**
	 * @return int|null
	 */
	public function get_id(): ?int {
		return $this->id ?? null;
	}

	/**
	 * @param int $id
	 *
	 * @return self
	 */
	public function set_id( int $id ): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_key(): string {
		return $this->key;
	}

	/**
	 * @param string $key
	 */
	public function set_key( string $key ): self {
		$this->key = $key;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_name(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return Reseller
	 */
	public function set_name( string $name ): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_service_provider_name(): string {
		return $this->service_provider_name;
	}

	/**
	 * @param string $service_provider_name
	 *
	 * @return Reseller
	 */
	public function set_service_provider_name( string $service_provider_name ): self {
		$this->service_provider_name = $service_provider_name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_service_provider_account(): string {
		return $this->service_provider_account;
	}

	/**
	 * @param string $service_provider_account
	 *
	 * @return Reseller
	 */
	public function set_service_provider_account( string $service_provider_account ): self {
		$this->service_provider_account = $service_provider_account;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_service_provider_opmode(): string {
		return $this->service_provider_opmode;
	}

	/**
	 * @param string $service_provider_opmode
	 *
	 * @return Reseller
	 */
	public function set_service_provider_opmode( string $service_provider_opmode ): self {
		$this->service_provider_opmode = $service_provider_opmode;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_status(): string {
		return $this->status;
	}

	/**
	 * @param string $status
	 *
	 * @return Reseller
	 */
	public function set_status( string $status ): self {
		$this->status = $status;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_auth_type(): string {
		return $this->auth_type;
	}

	/**
	 * @param string $auth_type
	 *
	 * @return Reseller
	 */
	public function set_auth_type( string $auth_type ): self {
		$this->auth_type = $auth_type;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_auth_user(): string {
		return $this->auth_user;
	}

	/**
	 * @param string $auth_user
	 * @return Reseller
	 */
	public function set_auth_user( string $auth_user ): self {
		$this->auth_user = $auth_user;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_auth_data(): string {
		return $this->auth_data;
	}

	/**
	 * @param string $auth_data
	 *
	 * @return Reseller
	 */
	public function set_auth_data( string $auth_data ): self {
		$this->auth_data = $auth_data;
		return $this;
	}

	/**
	 * @param array $data
	 *
	 * @return self
	 */
	public static function from_array( array $data ): self {
		$reseller = new self();

		if ( ! empty( $data[ self::COLUMN_ID ] ) ) {
			$reseller->set_id( (int) $data[ self::COLUMN_ID ] );
		}
		$reseller->set_key( $data[ self::COLUMN_RESELLER_KEY ] ?? '' )
			->set_name( $data[ self::COLUMN_RESELLER_NAME ] ?? '' )
			->set_service_provider_name( $data[ self::COLUMN_SERVICE_PROVIDER_NAME ] ?? 0 )
			->set_service_provider_account( $data[ self::COLUMN_SERVICE_PROVIDER_ACCOUNT ] ?? '' )
			->set_service_provider_opmode( $data[ self::COLUMN_SERVICE_PROVIDER_OPMODE ] ?? '' )
			->set_status( $data[ self::COLUMN_STATUS ] ?? '' )
			->set_auth_type( $data[ self::COLUMN_AUTH_TYPE ] ?? '' )
			->set_auth_user( $data[ self::COLUMN_AUTH_USER ] ?? '' )
			->set_auth_data( $data[ self::COLUMN_AUTH_DATA ] ?? '' );

		return $reseller;
	}

	/**
	 * @return array
	 */
	public function to_array(): array {
		return [
			self::COLUMN_ID => $this->get_id(),
			self::COLUMN_RESELLER_KEY => $this->get_key(),
			self::COLUMN_RESELLER_NAME => $this->get_name(),
			self::COLUMN_SERVICE_PROVIDER_NAME => $this->get_service_provider_name(),
			self::COLUMN_SERVICE_PROVIDER_ACCOUNT => $this->get_service_provider_account(),
			self::COLUMN_SERVICE_PROVIDER_OPMODE => $this->get_service_provider_opmode(),
			self::COLUMN_STATUS => $this->get_status(),
			self::COLUMN_AUTH_TYPE => $this->get_auth_type(),
			self::COLUMN_AUTH_USER => $this->get_auth_user(),
			self::COLUMN_AUTH_DATA => $this->get_auth_data(),
		];
	}

	/**
	 * @return string[]
	 */
	public static function get_fields(): array {
		return [
			self::COLUMN_ID,
			self::COLUMN_RESELLER_KEY,
			self::COLUMN_RESELLER_NAME,
			self::COLUMN_SERVICE_PROVIDER_NAME,
			self::COLUMN_SERVICE_PROVIDER_ACCOUNT,
			self::COLUMN_SERVICE_PROVIDER_OPMODE,
			self::COLUMN_STATUS,
			self::COLUMN_AUTH_TYPE,
			self::COLUMN_AUTH_USER,
			self::COLUMN_AUTH_DATA,
		];
	}
}
