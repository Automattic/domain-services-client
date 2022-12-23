Automattic\Domain_Services\Entity\Dns_Records
===============Set of DNS records associated with a specific domain
* Class name:Dns_Records
* Namespace:\Automattic\Domain_Services\EntityMethods
-------
###__constructmixed Automattic\Domain_Services\Entity\Dns_Records::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, \Automattic\Domain_Services\Entity\Dns_Record_Sets record_sets)Constructs a Dns_Records entity



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***record_sets **[Automattic\Domain_Services\Entity\Dns_Record_Sets](Automattic-Domain_Services-Entity-Dns_Record_Sets.md)**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Entity\Dns_Records::get_domain()Returns the domain name associated with the DNS records



* Visibility: **public**
###get_record_sets\Automattic\Domain_Services\Entity\Dns_Record_Sets Automattic\Domain_Services\Entity\Dns_Records::get_record_sets()Returns the sets of DNS records associated with a domain



* Visibility: **public**
###to_arrayarray Automattic\Domain_Services\Entity\Dns_Records::to_array()Returns an array containing sets of DNS records associated with a domain



* Visibility: **public**
###from_arraystatic Automattic\Domain_Services\Entity\Dns_Records::from_array(array dns_records_data)Constructs a Dns_Records entity from an array containing sets of DNS records



* Visibility: **public*** This method is **static**.#### Arguments*dns_records_data **array**
###get_dns_record_sets_array_keymixed Automattic\Domain_Services\Entity\Dns_Records::get_dns_record_sets_array_key()



* Visibility: **public*** This method is **static**.
###get_domain_name_array_keymixed Automattic\Domain_Services\Entity\Dns_Records::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.