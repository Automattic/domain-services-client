<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

interface Entity_Interface {
	public const DATE_FORMAT = 'Y-m-d H:i:s';

	public const SP1 = 'SP1';

	public const VALID_PROVIDER_IDS = [
		self::SP1,
	];
}
