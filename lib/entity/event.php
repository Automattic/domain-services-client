<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Persistence};

class Event implements Persistence\Entity_Interface {
	public const TABLE_NAME = 'dsapi_events';

	public const COLUMN_ID = 'dsapi_event_id';
	public const COLUMN_RESELLER_KEY = 'reseller_key';
	public const COLUMN_EVENT_SOURCE = 'event_source';
	public const COLUMN_EVENT_TARGET = 'event_target';
	public const COLUMN_EVENT_CLASS = 'event_class';
	public const COLUMN_EVENT_SUBCLASS = 'event_subclass';
	public const COLUMN_EVENT_DATA = 'event_data';
	public const COLUMN_OBJECT_TYPE = 'object_type';
	public const COLUMN_OBJECT_ID = 'object_id';
	public const COLUMN_CREATED_DATE = 'created_date';
	public const COLUMN_ACKNOWLEDGED_DATE = 'acknowledged_date';

	private ?int $id;
	private string $reseller_key;
	private string $event_source;
	private string $event_target;
	private string $event_class;
	private string $event_subclass;
	private ?array $event_data;
	private string $object_type;
	private string $object_id;
	private \DateTimeInterface $created_date;
	private ?\DateTimeInterface $acknowledged_date;

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
	 * @return string
	 */
	public function get_event_source(): string {
		return $this->event_source;
	}

	/**
	 * @param string $event_source
	 *
	 * @return self
	 */
	public function set_event_source( string $event_source ): self {
		$this->event_source = $event_source;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_event_target(): string {
		return $this->event_target;
	}

	/**
	 * @param string $event_target
	 *
	 * @return self
	 */
	public function set_event_target( string $event_target ): self {
		$this->event_target = $event_target;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_event_class(): string {
		return $this->event_class;
	}

	/**
	 * @param string $event_class
	 *
	 * @return self
	 */
	public function set_event_class( string $event_class ): self {
		$this->event_class = $event_class;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_event_subclass(): string {
		return $this->event_subclass;
	}

	/**
	 * @param string $event_subclass
	 *
	 * @return self
	 */
	public function set_event_subclass( string $event_subclass ): self {
		$this->event_subclass = $event_subclass;

		return $this;
	}

	/**
	 * @return array
	 */
	public function get_event_data(): array {
		return $this->event_data ?? [];
	}

	/**
	 * @param array|null $event_data
	 *
	 * @return self
	 */
	public function set_event_data( ?array $event_data ): self {
		$this->event_data = $event_data;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_object_type(): string {
		return $this->object_type;
	}

	/**
	 * @param string $object_type
	 *
	 * @return self
	 */
	public function set_object_type( string $object_type ): self {
		$this->object_type = $object_type;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_object_id(): string {
		return $this->object_id;
	}

	/**
	 * @param string $object_id
	 *
	 * @return self
	 */
	public function set_object_id( string $object_id ): self {
		$this->object_id = $object_id;

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
	 * @return \DateTimeInterface|null
	 */
	public function get_acknowledged_date(): ?\DateTimeInterface {
		return $this->acknowledged_date ?? null;
	}

	/**
	 * @param \DateTimeInterface|null $acknowledged_date
	 *
	 * @return self
	 */
	public function set_acknowledged_date( ?\DateTimeInterface $acknowledged_date ): self {
		$this->acknowledged_date = $acknowledged_date;

		return $this;
	}

	public static function from_array( array $data ): self {
		$event = new self();

		// TODO: if we need to do more data validations, this where it will go
		if ( ! empty( $data[ self::COLUMN_ID ] ) ) {
			$event->set_id( (int) $data[ self::COLUMN_ID ] );
		}

		$event->set_reseller_key( $data[ self::COLUMN_RESELLER_KEY ] ?? '' );
		$event->set_event_source( $data[ self::COLUMN_EVENT_SOURCE ] ?? '' );
		$event->set_event_target( $data[ self::COLUMN_EVENT_TARGET ] ?? '' );
		$event->set_event_class( $data[ self::COLUMN_EVENT_CLASS ] ?? '' );
		$event->set_event_subclass( $data[ self::COLUMN_EVENT_SUBCLASS ] ?? '' );
		$event->set_event_data( \json_decode( $data[ self::COLUMN_EVENT_DATA ] ?? '', true ) );
		$event->set_object_type( $data[ self::COLUMN_OBJECT_TYPE ] ?? '' );
		$event->set_object_id( $data[ self::COLUMN_OBJECT_ID ] ?? '' );
		$event->set_created_date( new \DateTimeImmutable( $data[ self::COLUMN_CREATED_DATE ] ?? 'now' ) );

		if ( ! empty( $data[ self::COLUMN_ACKNOWLEDGED_DATE ] ) ) {
			$event->set_acknowledged_date( new \DateTimeImmutable( $data[ self::COLUMN_ACKNOWLEDGED_DATE ] ) );
		}

		return $event;
	}

	public function to_array(): array {
		$result = [
			self::COLUMN_ID => $this->get_id(),
			self::COLUMN_RESELLER_KEY => $this->get_reseller_key(),
			self::COLUMN_EVENT_SOURCE => $this->get_event_source(),
			self::COLUMN_EVENT_TARGET => $this->get_event_target(),
			self::COLUMN_EVENT_CLASS => $this->get_event_class(),
			self::COLUMN_EVENT_SUBCLASS => $this->get_event_subclass(),
			self::COLUMN_EVENT_DATA => \json_encode( $this->get_event_data() ),
			self::COLUMN_OBJECT_TYPE => $this->get_object_type(),
			self::COLUMN_OBJECT_ID => $this->get_object_id(),
			self::COLUMN_CREATED_DATE => $this->get_created_date()->format( Entity_Interface::DATE_FORMAT ),
			self::COLUMN_ACKNOWLEDGED_DATE => null,
		];

		if ( null !== $this->get_acknowledged_date() ) {
			$result[ self::COLUMN_ACKNOWLEDGED_DATE ] = $this->get_acknowledged_date()->format( Entity_Interface::DATE_FORMAT );
		}

		return $result;
	}

	public static function get_fields(): array {
		return [
			self::COLUMN_ID,
			self::COLUMN_RESELLER_KEY,
			self::COLUMN_EVENT_SOURCE,
			self::COLUMN_EVENT_TARGET,
			self::COLUMN_EVENT_CLASS,
			self::COLUMN_EVENT_SUBCLASS,
			self::COLUMN_EVENT_DATA,
			self::COLUMN_OBJECT_TYPE,
			self::COLUMN_OBJECT_ID,
			self::COLUMN_CREATED_DATE,
			self::COLUMN_ACKNOWLEDGED_DATE,
		];
	}
}
