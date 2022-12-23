Automattic\Domain_Services\Entity\Dns_Record_Set
===============A set of DNS records that share the same name, type and TTL
* Class name:Dns_Record_Set
* Namespace:\Automattic\Domain_Services\EntityMethods
-------
###__constructmixed Automattic\Domain_Services\Entity\Dns_Record_Set::__construct(string name, \Automattic\Domain_Services\Entity\Dns_Record_Type type, int ttl, array data)Constructs a Dns_Record_Set entity



* Visibility: **public**#### Arguments*name **string***type **[Automattic\Domain_Services\Entity\Dns_Record_Type](Automattic-Domain_Services-Entity-Dns_Record_Type.md)***ttl **int***data **array**
###get_namestring Automattic\Domain_Services\Entity\Dns_Record_Set::get_name()Returns the name of this DNS record set



* Visibility: **public**
###get_type\Automattic\Domain_Services\Entity\Dns_Record_Type Automattic\Domain_Services\Entity\Dns_Record_Set::get_type()Returns the type of this DNS record set



* Visibility: **public**
###get_ttlint Automattic\Domain_Services\Entity\Dns_Record_Set::get_ttl()Returns the TTL of this DNS record set



* Visibility: **public**
###get_dataarray Automattic\Domain_Services\Entity\Dns_Record_Set::get_data()Returns the data of this DNS record set



* Visibility: **public**
###__toStringstring Automattic\Domain_Services\Entity\Dns_Record_Set::__toString()Returns a string representation of this DNS record set



* Visibility: **public**
###to_arrayarray Automattic\Domain_Services\Entity\Dns_Record_Set::to_array()Returns an associative array containing this DNS record set's values



* Visibility: **public**
###from_arraystatic Automattic\Domain_Services\Entity\Dns_Record_Set::from_array(array data)Constructs a Dns_Record_Set entity from an associative array containing a DNS record set



* Visibility: **public*** This method is **static**.#### Arguments*data **array**