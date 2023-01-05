# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Dns_Records

## Summary:

Set of DNS records associated with a specific domain


---

### Methods

* public [__construct()](#method___construct)
* public [from_array()](#method_from_array)
* public [get_dns_record_sets_array_key()](#method_get_dns_record_sets_array_key)
* public [get_domain()](#method_get_domain)
* public [get_domain_name_array_key()](#method_get_domain_name_array_key)
* public [get_record_sets()](#method_get_record_sets)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/entity/dns-records.php](../../lib/entity/dns-records.php)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Array_Key_Dns_Record_Sets_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Dns-Record-Sets-Trait.md)
  * [\Automattic\Domain_Services\Command\Array_Key_Domain_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Entity\Domain_Name](../classes/Automattic-Domain-Services-Entity-Domain-Name.md)
  * [\Automattic\Domain_Services\Entity\Dns_Record_Sets](../classes/Automattic-Domain-Services-Entity-Dns-Record-Sets.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain, \Automattic\Domain_Services\Entity\Dns_Record_Sets  record_sets) : mixed
```

##### Summary

Constructs a Dns_Records entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |
| **$record_sets** | \Automattic\Domain_Services\Entity\Dns_Record_Sets |  |

##### Returns:

```
mixed
```

---

<a id="method_from_array"></a>
### from_array

```
static public from_array(array  dns_records_data) : static
```

##### Summary

Constructs a Dns_Records entity from an array containing sets of DNS records

##### See Also:

 * [\Automattic\Domain_Services\Entity\Dns_Record_Sets](../classes/Automattic-Domain-Services-Entity-Dns-Record-Sets.md)

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$dns_records_data** | array |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
static
```

---

<a id="method_get_dns_record_sets_array_key"></a>
### get_dns_record_sets_array_key

```
final static public get_dns_record_sets_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services\Entity\Domain_Name
```

##### Summary

Returns the domain name associated with the DNS records

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Name
```

---

<a id="method_get_domain_name_array_key"></a>
### get_domain_name_array_key

```
final static public get_domain_name_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_record_sets"></a>
### get_record_sets

```
public get_record_sets() : \Automattic\Domain_Services\Entity\Dns_Record_Sets
```

##### Summary

Returns the sets of DNS records associated with a domain

##### Returns:

```
\Automattic\Domain_Services\Entity\Dns_Record_Sets
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### Summary

Returns an array containing sets of DNS records associated with a domain

##### Returns:

```
array
```
