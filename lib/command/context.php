<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command;

use Automattic\Domain_Services\{Entity, Exception, Log, Response};

class Context {
	private array $command_data;
	private Entity\Reseller $reseller;
	private string $client_txn_id;
	private string $server_txn_id;
	private float $timestamp;
	/**
	 * @var Log\Log[]
	 */
	private array $logs = [];
	private ?self $parent_context;
	private ?Exception\Domain_Services_Exception $last_exception = null;
	/**
	 * @var self[]
	 */
	private array $child_contexts = [];
	private ?Response\Data $response = null;

	/**
	 * @param Entity\Reseller $reseller
	 * @param array           $command_data
	 * @param Context|null    $parent_context
	 */
	public function __construct( Entity\Reseller $reseller, array $command_data, ?self $parent_context ) {
		$this->command_data = $command_data;
		$this->reseller = $reseller;
		$this->parent_context = $parent_context;
		$data_center_suffix = defined( 'DATACENTER' ) ? '.' . DATACENTER : '';
		$this->client_txn_id = '';
		$this->server_txn_id = \WPCOM\UUID\uuid() . $data_center_suffix;
		$this->timestamp = microtime( true );

		if ( null !== $parent_context ) {
			$parent_context->add_child( $this );
			$this->server_txn_id = $parent_context->get_server_txn_id();
		}
	}

	/**
	 * @return array
	 */
	public function get_command_data(): array {
		return $this->command_data;
	}

	/**
	 * @return string
	 */
	public function get_client_txn_id(): string {
		return $this->client_txn_id;
	}

	/**
	 * @param string $client_txn_id
	 */
	public function set_client_txn_id( string $client_txn_id ): void {
		$this->client_txn_id = $client_txn_id;
	}

	/**
	 * @return string
	 */
	public function get_server_txn_id(): string {
		return $this->server_txn_id;
	}

	/**
	 * @return float
	 */
	public function get_timestamp(): float {
		return $this->timestamp;
	}

	/**
	 * @return Entity\Reseller
	 */
	public function get_reseller(): Entity\Reseller {
		return $this->reseller;
	}

	/**
	 * @return Context|null
	 */
	public function get_parent_context(): ?Context {
		return $this->parent_context;
	}

	/**
	 * @param Context $context
	 *
	 * @return void
	 */
	public function add_child( self $context ): void {
		$this->child_contexts[] = $context;
	}

	/**
	 * @return Context[]
	 */
	public function get_child_contexts(): array {
		return $this->child_contexts;
	}

	/**
	 * @return Response\Data
	 */
	public function get_response(): ?Response\Data {
		return $this->response;
	}

	/**
	 * @param Response\Data $response
	 */
	public function set_response( Response\Data $response ): void {
		$this->response = $response;
	}

	/**
	 * @return Exception\Domain_Services_Exception|null
	 */
	public function get_last_exception(): ?Exception\Domain_Services_Exception {
		return $this->last_exception;
	}

	/**
	 * @param Exception\Domain_Services_Exception $exception
	 */
	public function set_last_exception( Exception\Domain_Services_Exception $exception ): void {
		$this->last_exception = $exception;

		if ( null !== $this->response ) {
			// We shouldn't have a response if an exception was thrown
			$this->log_error( 'Response present when an exception was thrown', $this->response->to_array() );
			return;
		}

		$this->response = $exception->to_response( $this );
	}

	/**
	 * @return Log\Log[]
	 */
	public function get_logs(): array {
		return $this->logs;
	}

	/**
	 * Adds a log to the log array.
	 *
	 * @param string $message
	 * @param array  $log_data
	 * @param string $level
	 */
	public function log( string $message, array $log_data = [], string $level = Log\Log_Level::INFO ): void {
		$this->logs[] = new Log\Log( $level, $message, $log_data );
	}

	/**
	 * Adds an error log to the log array.
	 *
	 * @param string $message
	 * @param array  $log_data
	 */
	public function log_error( string $message, array $log_data = [] ): void {
		$this->log( $message, $log_data, Log\Log_Level::ERROR );
	}

	/**
	 * Adds a warning log to the log array.
	 *
	 * @param string $message
	 * @param array  $log_data
	 */
	public function log_warning( string $message, array $log_data = [] ): void {
		$this->log( $message, $log_data, Log\Log_Level::WARNING );
	}
}
