<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Event;

use Automattic\Domain_Services\Entity\Entity_Interface;

trait Data_Trait {
	private array $data;

	final public function __construct( array $data = [] ) {
		$this->data = $data;
	}

	/**
	 * @param string $key
	 * @return array|mixed|null
	 */
	final public function get_data_by_key( string $key ) {
		$key_parts = explode( '.', $key );
		$data = $this->data;
		foreach ( $key_parts as $key_part ) {
			$data = $data[ $key_part ] ?? null;
		}
		return $data;
	}

	/**
	 * @return int
	 */
	public function get_id(): int {
		return $this->get_data_by_key( 'id' );
	}

	/**
	 * @return string
	 */
	public function get_event_class(): string {
		return $this->get_data_by_key( 'event_class' );
	}

	/**
	 * @return string
	 */
	public function get_event_subclass(): string {
		return $this->get_data_by_key( 'event_subclass' );
	}

	/**
	 * @return string
	 */
	public function get_object_type(): string {
		return $this->get_data_by_key( 'object_type' );
	}

	/**
	 * @return string
	 */
	public function get_object_id(): string {
		return $this->get_data_by_key( 'object_id' );
	}

	/**
	 * @return \DateTimeInterface
	 */
	public function get_created_date(): \DateTimeInterface {
		return \DateTimeImmutable::createFromFormat( Entity_Interface::DATE_FORMAT, $this->get_data_by_key( 'created_date' ) );
	}

	/**
	 * @return \DateTimeInterface|null
	 */
	public function get_acknowledged_date(): ?\DateTimeInterface {
		$acknowledged_date = $this->get_data_by_key( 'acknowledged_date' );
		if ( null === $acknowledged_date ) {
			return null;
		}

		return \DateTimeImmutable::createFromFormat( Entity_Interface::DATE_FORMAT, $this->get_data_by_key( 'acknowledged_date' ) );
	}

	/**
	 * @return array
	 * @throws \JsonException
	 */
	public function get_event_data(): array {
		return json_decode( $this->get_data_by_key( 'event_data' ), true, 512, JSON_THROW_ON_ERROR );
	}
}
