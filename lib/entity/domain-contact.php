<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Entity;

use Automattic\Domain_Services\{Command};

class Domain_Contact {
	use Command\Array_Key_Contact_Id_Trait, Command\Array_Key_Contact_Information_Trait, Command\Array_Key_Contact_Disclosure_Trait;
	/**
	 * The contact ID
	 *
	 * @var Contact_Id|null
	 */
	private ?Contact_Id $contact_id;

	/**
	 * The contact information
	 *
	 * @var Contact_Information|null
	 */
	private ?Contact_Information $contact_information;

	/**
	 * Which fields to disclose in Whois results
	 *
	 * @var Contact_Disclosure
	 */
	private Contact_Disclosure $contact_disclosure;

	public function __construct( ?Contact_Id $contact_id = null, ?Contact_Information $contact_info = null, ?Contact_Disclosure $disclose_fields = null ) {
		$this->contact_id = $contact_id;
		$this->contact_information = $contact_info;

		if ( null === $disclose_fields ) {
			$disclose_fields = new Contact_Disclosure( Contact_Disclosure::NONE );
		}
		$this->contact_disclosure = $disclose_fields;
	}

	public function to_array(): array {
		$contact_info = $this->get_contact_information();
		if ( null !== $contact_info ) {
			$contact_info = $contact_info->to_array();
		}

		return [
			self::get_contact_id_array_key() => (string) $this->get_contact_id(),
			self::get_contact_information_array_key() => $contact_info,
			self::get_contact_disclosure_array_key() => $this->get_contact_disclosure()->get_disclose_fields(),
		];
	}

	public static function from_array( array $data ): self {
		$domain_contact = new Domain_Contact();

		if ( null !== ( $data[ self::get_contact_id_array_key() ] ?? null ) ) {
			$contact_id = new Contact_Id( $data[ self::get_contact_id_array_key() ] );
			$domain_contact->set_contact_id( $contact_id );
		}

		if ( null !== ( $data[ self::get_contact_information_array_key() ] ?? null ) ) {
			$contact_information = Contact_Information::from_array( $data[ self::get_contact_information_array_key() ] );
			$domain_contact->set_contact_information( $contact_information );
		}

		if ( null !== ( $data[ self::get_contact_disclosure_array_key() ] ?? null ) ) {
			$contact_disclosure = new Contact_Disclosure( $data[ self::get_contact_disclosure_array_key() ] );
			$domain_contact->set_contact_disclosure( $contact_disclosure );
		}

		return $domain_contact;
	}

	/**
	 * @return Contact_Id|null
	 */
	public function get_contact_id(): ?Contact_Id {
		return $this->contact_id;
	}

	/**
	 * @param Contact_Id|null $contact_id
	 */
	public function set_contact_id( Contact_Id $contact_id ): void {
		$this->contact_id = $contact_id;
	}

	/**
	 * @return Contact_Information|null
	 */
	public function get_contact_information(): ?Contact_Information {
		return $this->contact_information;
	}

	/**
	 * @param Contact_Information|null $contact_information
	 */
	public function set_contact_information( Contact_Information $contact_information ): void {
		$this->contact_information = $contact_information;
	}

	/**
	 * @return Contact_Disclosure
	 */
	public function get_contact_disclosure(): Contact_Disclosure {
		return $this->contact_disclosure;
	}

	/**
	 * @param Contact_Disclosure $contact_disclosure
	 */
	public function set_contact_disclosure( Contact_Disclosure $contact_disclosure ): void {
		$this->contact_disclosure = $contact_disclosure;
	}
}
