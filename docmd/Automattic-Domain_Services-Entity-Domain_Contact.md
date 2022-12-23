Automattic\Domain_Services\Entity\Domain_Contact
===============Represents a domain contactRepresents one of the domain's contacts and its privacy setting.
* Class name:Domain_Contact
* Namespace:\Automattic\Domain_Services\EntityMethods
-------
###__constructmixed Automattic\Domain_Services\Entity\Domain_Contact::__construct(?\Automattic\Domain_Services\Entity\Contact_Id contact_id, ?\Automattic\Domain_Services\Entity\Contact_Information contact_info, ?\Automattic\Domain_Services\Entity\Contact_Disclosure disclose_fields)



* Visibility: **public**#### Arguments*contact_id **?\Automattic\Domain_Services\Entity\Contact_Id***contact_info **?\Automattic\Domain_Services\Entity\Contact_Information***disclose_fields **?\Automattic\Domain_Services\Entity\Contact_Disclosure**
###to_arrayarray Automattic\Domain_Services\Entity\Domain_Contact::to_array()Returns an array representation of this instance



* Visibility: **public**
###from_arraystatic Automattic\Domain_Services\Entity\Domain_Contact::from_array(array data)Builds an instance from an array

The array can include `contact_id`, `contact_information`, and/or `contact_disclosure`

* Visibility: **public*** This method is **static**.#### Arguments*data **array**
###get_contact_id\Automattic\Domain_Services\Entity\Contact_Id|null Automattic\Domain_Services\Entity\Domain_Contact::get_contact_id()



* Visibility: **public**
###set_contact_idmixed Automattic\Domain_Services\Entity\Domain_Contact::set_contact_id(\Automattic\Domain_Services\Entity\Contact_Id|null contact_id)



* Visibility: **public**#### Arguments*contact_id **[Automattic\Domain_Services\Entity\Contact_Id](Automattic-Domain_Services-Entity-Contact_Id.md)|null**
###get_contact_information\Automattic\Domain_Services\Entity\Contact_Information|null Automattic\Domain_Services\Entity\Domain_Contact::get_contact_information()



* Visibility: **public**
###set_contact_informationmixed Automattic\Domain_Services\Entity\Domain_Contact::set_contact_information(\Automattic\Domain_Services\Entity\Contact_Information|null contact_information)



* Visibility: **public**#### Arguments*contact_information **[Automattic\Domain_Services\Entity\Contact_Information](Automattic-Domain_Services-Entity-Contact_Information.md)|null**
###get_contact_disclosure\Automattic\Domain_Services\Entity\Contact_Disclosure Automattic\Domain_Services\Entity\Domain_Contact::get_contact_disclosure()



* Visibility: **public**
###set_contact_disclosuremixed Automattic\Domain_Services\Entity\Domain_Contact::set_contact_disclosure(\Automattic\Domain_Services\Entity\Contact_Disclosure contact_disclosure)



* Visibility: **public**#### Arguments*contact_disclosure **[Automattic\Domain_Services\Entity\Contact_Disclosure](Automattic-Domain_Services-Entity-Contact_Disclosure.md)**
###get_contact_id_array_keymixed Automattic\Domain_Services\Entity\Domain_Contact::get_contact_id_array_key()



* Visibility: **public*** This method is **static**.
###get_contact_information_array_keymixed Automattic\Domain_Services\Entity\Domain_Contact::get_contact_information_array_key()



* Visibility: **public*** This method is **static**.
###get_contact_disclosure_array_keymixed Automattic\Domain_Services\Entity\Domain_Contact::get_contact_disclosure_array_key()



* Visibility: **public*** This method is **static**.