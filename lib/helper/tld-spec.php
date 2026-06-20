<?php declare( strict_types=1 );

namespace Automattic\Domain_Services_Client\Helper;

use const Automattic\Domain_Services_Client\Tld_Spec\Data\Effective_Tld_List\TLDS;

/**
 * Helper class that wraps information about domain TLDs
 */
class Tld_Spec {
	/**
	 * Returns the TLD part of a domain name
	 *
	 * @param string $domain_name
	 *
	 * @return string
	 */
	public static function extract_tld( string $domain_name ): string {
		require_once __DIR__ . '/../tld-spec/data/effective-tld-list.php';

		$parts = explode( '.', $domain_name );

		return self::extract_tld_part( $parts );
	}

	/**
	 * Extracts the TLD from the specified domain name parts.
	 *
	 * @param array $parts domain name parts
	 * @param int $index index of the domain name part to process
	 *
	 * @return string either a valid TLD or a blank string if no valid TLD could be identified
	 */
	private static function extract_tld_part( array $parts, int $index = 0 ): string {
		$effective_tld_list = TLDS;

		if ( $index >= count( $parts ) ) {
			return '';
		}

		$parts_from_index = array_slice( $parts, $index );

		$suffix = implode( '.', $parts_from_index );

		array_shift( $parts_from_index );
		$parent_suffix = implode( '.', $parts_from_index );

		$is_suffix_found = isset( $effective_tld_list[ $suffix ] );
		$is_suffix_with_exception_found = isset( $effective_tld_list[ '!' . $suffix ] );
		$is_suffix_with_wildcard_found = isset( $effective_tld_list[ '*.' . $suffix ] );
		$is_parent_suffix_with_wildcard_found = isset( $effective_tld_list[ '*.' . $parent_suffix ] );

		if ( $is_suffix_found || $is_suffix_with_wildcard_found || ( ! $is_suffix_with_exception_found && $is_parent_suffix_with_wildcard_found ) ) {
			return $suffix;
		}

		return self::extract_tld_part( $parts, $index + 1 );
	}
}
