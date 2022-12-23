Automattic\Domain_Services\Entity\Contact_Disclosure
===============The list of domain contact fields to disclose in the Whois results
* Class name:Contact_Disclosure
* Namespace:\Automattic\Domain_Services\EntityConstants
----------
###NONEconst NONE = 'none'
###ALLconst ALL = 'all'
###VALID_DISCLOSURE_SETTINGSconst VALID_DISCLOSURE_SETTINGS = [self::NONE, self::ALL]Methods
-------
###__constructmixed Automattic\Domain_Services\Entity\Contact_Disclosure::__construct(string disclose_fields)



* Visibility: **public**#### Arguments*disclose_fields **string** -The fields to disclose in whois responses
###build_from_whois_privacystatic Automattic\Domain_Services\Entity\Contact_Disclosure::build_from_whois_privacy(\Automattic\Domain_Services\Entity\Whois_Privacy whois_privacy)Generate the contact disclosure fields based on the given whois privacy settings.



* Visibility: **public*** This method is **static**.#### Arguments*whois_privacy **[Automattic\Domain_Services\Entity\Whois_Privacy](Automattic-Domain_Services-Entity-Whois_Privacy.md)**
###get_disclose_fieldsstring Automattic\Domain_Services\Entity\Contact_Disclosure::get_disclose_fields()Get the disclosed fields as a comma delimited list.



* Visibility: **public**
###__toStringstring Automattic\Domain_Services\Entity\Contact_Disclosure::__toString()Get the disclosed fields as a comma delimited list.



* Visibility: **public**