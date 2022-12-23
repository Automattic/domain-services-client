Automattic\Domain_Services\Entity\Domain_Contacts
===============Represents all contact types for a domain name
* Class name:Domain_Contacts
* Namespace:\Automattic\Domain_Services\Entity* This class implements:IteratorConstants
----------
###OWNERconst OWNER = 'owner'
###ADMINconst ADMIN = 'admin'
###TECHconst TECH = 'tech'
###BILLINGconst BILLING = 'billing'Methods
-------
###__constructmixed Automattic\Domain_Services\Entity\Domain_Contacts::__construct(\Automattic\Domain_Services\Entity\Domain_Contact|null owner, \Automattic\Domain_Services\Entity\Domain_Contact|null admin, \Automattic\Domain_Services\Entity\Domain_Contact|null tech, \Automattic\Domain_Services\Entity\Domain_Contact|null billing)



* Visibility: **public**#### Arguments*owner **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null***admin **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null***tech **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null***billing **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null**
###is_emptymixed Automattic\Domain_Services\Entity\Domain_Contacts::is_empty()



* Visibility: **public**
###to_arraystring[] Automattic\Domain_Services\Entity\Domain_Contacts::to_array()Returns an array of contact IDs that can be returned with the DSAPI response data.



* Visibility: **public**
###from_arraystatic Automattic\Domain_Services\Entity\Domain_Contacts::from_array(array data)Builds an instance from an array

- The $data array is expected to have the contact type as key and an array as a value.
- The array can either have a `contact_id` or a `contact_information` key with the corresponding data.
- There is also an optional `contact_disclosure` that can be passed for each contact.

* Visibility: **public*** This method is **static**.#### Arguments*data **array**
###set_by_keyvoid Automattic\Domain_Services\Entity\Domain_Contacts::set_by_key(string key, \Automattic\Domain_Services\Entity\Domain_Contact domain_contact)Sets domain contact by type



* Visibility: **public**#### Arguments*key **string***domain_contact **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)**
###get_by_key\Automattic\Domain_Services\Entity\Domain_Contact|null Automattic\Domain_Services\Entity\Domain_Contacts::get_by_key(string key)Gets domain contact by type



* Visibility: **public**#### Arguments*key **string**
###get_valid_contact_typesstring[] Automattic\Domain_Services\Entity\Domain_Contacts::get_valid_contact_types()Returns a list of the valid contact types



* Visibility: **public*** This method is **static**.
###get_owner\Automattic\Domain_Services\Entity\Domain_Contact|null Automattic\Domain_Services\Entity\Domain_Contacts::get_owner()Gets the domain owner's contact



* Visibility: **public**
###set_ownermixed Automattic\Domain_Services\Entity\Domain_Contacts::set_owner(\Automattic\Domain_Services\Entity\Domain_Contact owner)Sets the domain owner's contact



* Visibility: **public**#### Arguments*owner **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)**
###get_admin\Automattic\Domain_Services\Entity\Domain_Contact|null Automattic\Domain_Services\Entity\Domain_Contacts::get_admin()Gets the domain admin's contact



* Visibility: **public**
###set_adminmixed Automattic\Domain_Services\Entity\Domain_Contacts::set_admin(\Automattic\Domain_Services\Entity\Domain_Contact|null admin)Sets the domain admin's contact



* Visibility: **public**#### Arguments*admin **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null**
###get_tech\Automattic\Domain_Services\Entity\Domain_Contact|null Automattic\Domain_Services\Entity\Domain_Contacts::get_tech()Gets the domain tech's contact



* Visibility: **public**
###set_techmixed Automattic\Domain_Services\Entity\Domain_Contacts::set_tech(\Automattic\Domain_Services\Entity\Domain_Contact|null tech)Sets the domain tech's contact



* Visibility: **public**#### Arguments*tech **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null**
###get_billing\Automattic\Domain_Services\Entity\Domain_Contact|null Automattic\Domain_Services\Entity\Domain_Contacts::get_billing()Gets the domain billing's contact



* Visibility: **public**
###set_billingmixed Automattic\Domain_Services\Entity\Domain_Contacts::set_billing(\Automattic\Domain_Services\Entity\Domain_Contact|null billing)Sets the domain billing's contact



* Visibility: **public**#### Arguments*billing **[Automattic\Domain_Services\Entity\Domain_Contact](Automattic-Domain_Services-Entity-Domain_Contact.md)|null**
###currentmixed Automattic\Domain_Services\Entity\Domain_Contacts::current()Functions to implement the Iterator interface



* Visibility: **public**
###nextmixed Automattic\Domain_Services\Entity\Domain_Contacts::next()



* Visibility: **public**
###keymixed Automattic\Domain_Services\Entity\Domain_Contacts::key()



* Visibility: **public**
###validmixed Automattic\Domain_Services\Entity\Domain_Contacts::valid()



* Visibility: **public**
###rewindmixed Automattic\Domain_Services\Entity\Domain_Contacts::rewind()



* Visibility: **public**