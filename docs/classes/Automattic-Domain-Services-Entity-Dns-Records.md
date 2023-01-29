# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Dns_Records

## Summary:

Set of DNS records associated with a specific domain


---

### Methods

* public [__construct()](#method___construct)
* public [get_domain()](#method_get_domain)
* public [get_record_sets()](#method_get_record_sets)

---

### Details

* File: [lib/entity/dns-records.php](../../lib/entity/dns-records.php)
* See Also:
  * [\Automattic\Domain_Services_Client\Entity\Domain_Name](../classes/Automattic-Domain-Services-Entity-Domain-Name.md)
  * [\Automattic\Domain_Services_Client\Entity\Dns_Record_Sets](../classes/Automattic-Domain-Services-Entity-Dns-Record-Sets.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, \Automattic\Domain_Services_Client\Entity\Dns_Record_Sets  record_sets) : mixed
```

##### Summary

Constructs a Dns_Records entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$record_sets** | \Automattic\Domain_Services_Client\Entity\Dns_Record_Sets |  |

##### Returns:

```
mixed
```

---

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services_Client\Entity\Domain_Name
```

##### Summary

Returns the domain name associated with the DNS records

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
```

---

<a id="method_get_record_sets"></a>
### get_record_sets

```
public get_record_sets() : \Automattic\Domain_Services_Client\Entity\Dns_Record_Sets
```

##### Summary

Returns the sets of DNS records associated with a domain

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Dns_Record_Sets
```
