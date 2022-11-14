<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Command\Events;

use Automattic\Domain_Services\{Command,Entity};

/**
 * Retrieves a list of events.
 */
class Get implements Command\Command_Interface {
	use Command\Command_Trait, Command\Array_Key_Event_Trait;

	/**
	 * Index of first record to include, for pagination
	 *
	 * @var int
	 */
	private int $first;

	/**
	 * Max count of returned events
	 *
	 * @var int
	 */
	private int $limit;

	/**
	 * Pattern to use to filter event class
	 *
	 * @var string|null
	 */
	private ?string $filter;

	/**
	 * Show already acknowledged events
	 *
	 * @var bool
	 */
	private bool $show_acknowledged;

	/**
	 * Limit results by events that happened after or on this date
	 *
	 * @var \DateTimeInterface|null
	 */
	private ?\DateTimeInterface $date_start;

	/**
	 * Limit results to events happened before or on this date
	 *
	 * @var \DateTimeInterface|null
	 */
	private ?\DateTimeInterface $date_end;

	/**
	 * Hide event details in the result
	 *
	 * @var bool
	 */
	private bool $hide_details;

	/**
	 * Class contructor
	 *
	 * @param null|string $filter Pattern to use to filter event class.
	 * @param null|int $first Index of first record to include, for pagination.
	 * @param null|int $limit Max count of returned events.
	 * @param null|string $date_start Limit results by events that happened after or on this date (date string should be in this format 'Y-m-d H:i:s').
	 * @param null|string $date_end Limit results to events happened before or on this date (date string should be in this format 'Y-m-d H:i:s').
	 * @param null|bool $show_acknowledged Show already acknowledged events.
	 * @param null|bool $hide_details Hide event details in the result.
	 */
	public function __construct( ?string $filter = null, ?int $first = 0, ?int $limit = 50, ?string $date_start = null, ?string $date_end = null, ?bool $show_acknowledged = false, ?bool $hide_details = false ) {
		$this->filter = $filter;
		$this->first = $first;
		$this->limit = $limit;
		if ( $date_start ) {
			$date = \DateTime::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $date_start );
			$this->date_start = $date ? $date : null;
		} else {
			$this->date_start = null;
		}
		if ( $date_end ) {
			$date = \DateTime::createFromFormat( Entity\Entity_Interface::DATE_FORMAT, $date_end );
			$this->date_end = $date ? $date : null;
		} else {
			$this->date_end = null;
		}
		$this->show_acknowledged = $show_acknowledged;
		$this->hide_details = $hide_details;
	}

	/**
	 * @return ?string|null
	 */
	public function get_filter(): ?string {
		return $this->filter;
	}

	/**
	 * @return int
	 */
	public function get_first(): int {
		return $this->first;
	}

	/**
	 * @return int
	 */
	public function get_limit(): int {
		return $this->limit;
	}

	/**
	 * @return \DateTimeInterface|null
	 */
	public function get_date_start(): ?\DateTimeInterface {
		return $this->date_start;
	}

	/**
	 * @return \DateTimeInterface|null
	 */
	public function get_date_end(): ?\DateTimeInterface {
		return $this->date_end;
	}

	/**
	 * @return bool
	 */
	public function get_show_acknowledged(): bool {
		return $this->show_acknowledged;
	}

	/**
	 * @return bool
	 */
	public function get_hide_details(): bool {
		return $this->hide_details;
	}

	/**
	 * @return string
	 */
	public static function get_name(): string {
		return 'Events_Get';
	}

	public function to_array(): array {
		return [
			self::get_event_date_start_array_key() => $this->get_date_start()->format( Entity\Entity_Interface::DATE_FORMAT ),
			self::get_event_date_end_array_key() => $this->get_date_end()->format( Entity\Entity_Interface::DATE_FORMAT ),
			self::get_event_filter_array_key() => $this->get_filter(),
			self::get_event_first_array_key() => $this->get_first(),
			self::get_event_limit_array_key() => $this->get_limit(),
			self::get_event_show_acknowledged_array_key() => $this->get_show_acknowledged(),
		];
	}
}
