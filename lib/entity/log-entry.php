<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Command, Persistence};

class Log_Entry implements Persistence\Entity_Interface {
	public const TABLE_NAME = 'dsapi_command_log';

	public const COLUMN_ID = 'dsapi_command_log_id';
	public const COLUMN_RESELLER_KEY = 'reseller_key';
	public const COLUMN_DOMAIN_NAME = 'domain_name';
	public const COLUMN_COMMAND_NAME = 'command_name';
	public const COLUMN_COMMAND_PARAMS = 'command_params';
	public const COLUMN_CLIENT_TXN_ID = 'client_txn_id';
	public const COLUMN_SERVER_TXN_ID = 'server_txn_id';
	public const COLUMN_CREATED_DATE = 'created_date';
	public const COLUMN_PARENT_ID = 'parent_id';
	public const COLUMN_LOG_DATA = 'log_data';
	public const COLUMN_RESPONSE_DATA = 'response_data';
	public const COLUMN_RESPONSE_CODE = 'response_code';
	public const COLUMN_SUCCESS = 'success';

	private ?int $id;
	private string $reseller_key;
	private ?string $domain_name;
	private string $command_name;
	private array $command_params;
	private string $client_txn_id;
	private string $server_txn_id;
	private \DateTimeInterface $created_date;
	private ?int $parent_id;
	private ?array $log_data;
	private array $response_data;
	private int $response_code;
	private bool $success;

	/**
	 * @return ?int
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
	public function get_reseller_key(): string {
		return $this->reseller_key;
	}

	/**
	 * @param string $reseller_key
	 *
	 * @return self
	 */
	public function set_reseller_key( string $reseller_key ): self {
		$this->reseller_key = $reseller_key;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function get_domain_name(): ?string {
		return $this->domain_name;
	}

	/**
	 * @param string $domain_name
	 *
	 * @return self
	 */
	public function set_domain_name( ?string $domain_name ): self {
		$this->domain_name = $domain_name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_command_name(): string {
		return $this->command_name;
	}

	/**
	 * @param string $command_name
	 *
	 * @return self
	 */
	public function set_command_name( string $command_name ): self {
		$this->command_name = $command_name;
		return $this;
	}

	/**
	 * @return array
	 */
	public function get_command_params(): array {
		return $this->command_params;
	}

	/**
	 * @param array $command_params
	 *
	 * @return self
	 */
	public function set_command_params( array $command_params ): self {
		$this->command_params = $command_params;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_client_txn_id(): string {
		return $this->client_txn_id;
	}

	/**
	 * @param string $client_txn_id
	 *
	 * @return self
	 */
	public function set_client_txn_id( string $client_txn_id ): self {
		$this->client_txn_id = $client_txn_id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_server_txn_id(): string {
		return $this->server_txn_id;
	}

	/**
	 * @param string $server_txn_id
	 *
	 * @return self
	 */
	public function set_server_txn_id( string $server_txn_id ): self {
		$this->server_txn_id = $server_txn_id;
		return $this;
	}

	/**
	 * @return \DateTimeInterface
	 */
	public function get_created_date(): \DateTimeInterface {
		return $this->created_date;
	}

	/**
	 * @param \DateTimeInterface $created_date
	 *
	 * @return self
	 */
	public function set_created_date( \DateTimeInterface $created_date ): self {
		$this->created_date = $created_date;
		return $this;
	}

	/**
	 * @return ?int
	 */
	public function get_parent_id(): ?int {
		return $this->parent_id ?? null;
	}

	/**
	 * @param ?int $parent_id
	 *
	 * @return self
	 */
	public function set_parent_id( ?int $parent_id ): self {
		$this->parent_id = $parent_id;
		return $this;
	}

	/**
	 * @return ?array
	 */
	public function get_log_data(): ?array {
		return $this->log_data;
	}

	/**
	 * @param ?array $log_data
	 *
	 * @return self
	 */
	public function set_log_data( ?array $log_data ): self {
		$this->log_data = $log_data;
		return $this;
	}

	/**
	 * @return array
	 */
	public function get_response_data(): array {
		return $this->response_data;
	}

	/**
	 * @param array $response_data
	 *
	 * @return self
	 */
	public function set_response_data( array $response_data ): self {
		$this->response_data = $response_data;

		return $this;
	}

	/**
	 * @return int
	 */
	public function get_response_code(): int {
		return $this->response_code;
	}

	/**
	 * @param int $response_code
	 *
	 * @return self
	 */
	public function set_response_code( int $response_code ): self {
		$this->response_code = $response_code;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function get_success(): bool {
		return $this->success;
	}

	/**
	 * @param bool $success
	 *
	 * @return self
	 */
	public function set_success( bool $success ): self {
		$this->success = $success;
		return $this;
	}

	public static function from_array( array $data ): self {
		$log_entry = new self();

		if ( ! empty( $data[ self::COLUMN_ID ] ) ) {
			$log_entry->set_id( (int) $data[ self::COLUMN_ID ] );
		}
		$log_entry->set_reseller_key( $data[ self::COLUMN_RESELLER_KEY ] ?? '' );
		$log_entry->set_domain_name( $data[ self::COLUMN_DOMAIN_NAME ] ?? '' );
		$log_entry->set_command_name( $data[ self::COLUMN_COMMAND_NAME ] ?? '' );
		$log_entry->set_command_params( \json_decode( $data[ self::COLUMN_COMMAND_PARAMS ] ?? '[]', true ) );
		$log_entry->set_client_txn_id( $data[ self::COLUMN_CLIENT_TXN_ID ] ?? '' );
		$log_entry->set_server_txn_id( $data[ self::COLUMN_SERVER_TXN_ID ] ?? '' );
		$log_entry->set_created_date( new \DateTimeImmutable( $data[ self::COLUMN_CREATED_DATE ] ) );
		$log_entry->set_parent_id( $data[ self::COLUMN_PARENT_ID ] ? (int) $data[ self::COLUMN_PARENT_ID ] : null );
		$log_entry->set_log_data( $data[ self::COLUMN_LOG_DATA ] ? \json_decode( $data[ self::COLUMN_LOG_DATA ] ?? '[]', true ) : null );
		$log_entry->set_response_data( \json_decode( $data[ self::COLUMN_RESPONSE_DATA ] ?? '[]', true ) );
		$log_entry->set_response_code( (int) $data[ self::COLUMN_RESPONSE_CODE ] );
		$log_entry->set_success( (bool) $data[ self::COLUMN_SUCCESS ] );

		return $log_entry;
	}

	public static function from_context( Command\Context $context, int $parent_id = null ): self {
		$command_data = $context->get_command_data();
		$response = $context->get_response();

		$log_entry = new self();
		$log_entry->set_reseller_key( $context->get_reseller()->get_key() ?? '' );
		$log_entry->set_domain_name( $command_data[ Command\Command_Interface::PARAMS ]['domain'] ?? '' );
		$log_entry->set_command_name( $command_data[ Command\Command_Interface::COMMAND ] ?? '' );
		$log_entry->set_command_params( $command_data[ Command\Command_Interface::PARAMS ] ?? [] );
		$log_entry->set_created_date( \DateTimeImmutable::createFromFormat( 'U', (string) (int) $context->get_timestamp() ) );
		$log_entry->set_client_txn_id( $context->get_client_txn_id() );
		$log_entry->set_server_txn_id( $context->get_server_txn_id() );
		$log_entry->set_parent_id( $parent_id ?? null );
		$log_entry->set_log_data( $context->get_logs() );
		$log_entry->set_response_data( $response ? $response->to_array() : [] );
		$log_entry->set_response_code( $response ? $response->get_status() : 0 );
		$log_entry->set_success( $response ? $response->is_success() : false );

		return $log_entry;
	}

	public function to_array(): array {
		$result = [
			self::COLUMN_ID => $this->get_id(),
			self::COLUMN_RESELLER_KEY => $this->get_reseller_key(),
			self::COLUMN_DOMAIN_NAME => $this->get_domain_name(),
			self::COLUMN_COMMAND_NAME => $this->get_command_name(),
			self::COLUMN_COMMAND_PARAMS => \json_encode( $this->get_command_params() ),
			self::COLUMN_CREATED_DATE => $this->get_created_date()->format( Entity_Interface::DATE_FORMAT ),
			self::COLUMN_CLIENT_TXN_ID => $this->get_client_txn_id(),
			self::COLUMN_SERVER_TXN_ID => $this->get_server_txn_id(),
			self::COLUMN_PARENT_ID => $this->get_parent_id(),
			self::COLUMN_LOG_DATA => $this->get_log_data() ? \json_encode( $this->get_log_data() ) : null,
			self::COLUMN_RESPONSE_DATA => \json_encode( $this->get_response_data() ),
			self::COLUMN_RESPONSE_CODE => $this->get_response_code(),
			self::COLUMN_SUCCESS => $this->get_success(),
		];

		return $result;
	}

	public static function get_fields(): array {
		return [
			self::COLUMN_ID,
			self::COLUMN_RESELLER_KEY,
			self::COLUMN_DOMAIN_NAME,
			self::COLUMN_COMMAND_NAME,
			self::COLUMN_COMMAND_PARAMS,
			self::COLUMN_CREATED_DATE,
			self::COLUMN_CLIENT_TXN_ID,
			self::COLUMN_SERVER_TXN_ID,
			self::COLUMN_PARENT_ID,
			self::COLUMN_LOG_DATA,
			self::COLUMN_RESPONSE_DATA,
			self::COLUMN_RESPONSE_CODE,
			self::COLUMN_SUCCESS,
		];
	}
}
