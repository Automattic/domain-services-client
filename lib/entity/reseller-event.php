<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Exception};

class Reseller_Event {

	public const ID = 'id';
	public const EVENT_CLASS = 'event_class';
	public const EVENT_SUBCLASS = 'event_subclass';
	public const EVENT_DATA = 'event_data';
	public const OBJECT_TYPE = 'object_type';
	public const OBJECT_ID = 'object_id';
	public const CREATED_DATE = 'created_date';
	public const ACKNOWLEDGED_DATE = 'acknowledged_date';

	private int $id;
	private string $event_class;
	private string $event_subclass;
	private array $event_data;
	private string $object_type;
	private string $object_id;
	private \DateTimeInterface $created_date;
	private ?\DateTimeInterface $acknowledged_date;

	/**
	 * @return int
	 */
	public function get_id(): int {
		return $this->id;
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
	public function get_source(): string {
		return $this->source;
	}

	/**
	 * @param string $source
	 *
	 * @return self
	 */
	public function set_source( string $source ): self {
		$this->source = $source;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_target(): string {
		return $this->target;
	}

	/**
	 * @param string $target
	 *
	 * @return self
	 */
	public function set_target( string $target ): self {
		$this->target = $target;

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
		return $this->event_data;
	}

	/**
	 * @param array $event_data
	 *
	 * @return self
	 */
	public function set_event_data( array $event_data ): self {
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

	/**
	 * @param Event $event_entity
	 * @return Reseller_Event
	 * @throws Exception\Entity\Invalid_Value_Exception
	 */
	public static function from_event_entity( Event $event_entity ): self {
		$reseller_event = new self();
		$id = $event_entity->get_id();
		if ( null === $id ) {
			throw new Exception\Entity\Invalid_Value_Exception( __CLASS__, 'ID field cannot be null' );
		}
		$reseller_event->set_id( $id )
			->set_event_class( $event_entity->get_event_class() )
			->set_event_subclass( $event_entity->get_event_subclass() )
			->set_object_type( $event_entity->get_object_type() )
			->set_object_id( $event_entity->get_object_id() )
			->set_event_data( $event_entity->get_event_data() )
			->set_created_date( $event_entity->get_created_date() )
			->set_acknowledged_date( $event_entity->get_acknowledged_date() );
		return $reseller_event;
	}

	public function to_array(): array {
		$result = [
			self::ID => $this->get_id(),
			self::EVENT_CLASS => $this->get_event_class(),
			self::EVENT_SUBCLASS => $this->get_event_subclass(),
			self::EVENT_DATA => \json_encode( $this->get_event_data() ),
			self::OBJECT_TYPE => $this->get_object_type(),
			self::OBJECT_ID => $this->get_object_id(),
			self::CREATED_DATE => $this->get_created_date()->format( Entity_Interface::DATE_FORMAT ),
			self::ACKNOWLEDGED_DATE => $this->get_acknowledged_date() ? $this->get_acknowledged_date()->format( Entity_Interface::DATE_FORMAT ) : null,
		];
		return $result;
	}

	/**
	 * @throws \JsonException
	 */
	public static function from_array( array $data ): self {
		$reseller_event = new self();
		$event_data = json_decode( $data[ self::EVENT_DATA ], true, 512, JSON_THROW_ON_ERROR );
		$created_date = \DateTimeImmutable::createFromFormat( Entity_Interface::DATE_FORMAT, $data[ self::CREATED_DATE ] );
		$acknowledged_date = \DateTimeImmutable::createFromFormat( Entity_Interface::DATE_FORMAT, $data[ self::ACKNOWLEDGED_DATE ] );

		$reseller_event->set_id( $data[ self::ID ] )
			->set_event_class( $data[ self::EVENT_CLASS ] )
			->set_event_subclass( $data[ self::EVENT_SUBCLASS ] )
			->set_object_type( $data[ self::OBJECT_TYPE ] )
			->set_object_id( $data[ self::OBJECT_ID ] )
			->set_event_data( $event_data )
			->set_created_date( $created_date )
			->set_acknowledged_date( $acknowledged_date );

		return $reseller_event;
	}
}
