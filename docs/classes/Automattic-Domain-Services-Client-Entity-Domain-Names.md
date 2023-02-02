# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Domain_Names

## Summary:

List of `Domain_Name` entities


---

### Methods

* public [__construct()](#method___construct)
* public [add_domain_name()](#method_add_domain_name)
* public [get_domain_names()](#method_get_domain_names)

---

### Details

* File: [lib/entity/domain-names.php](../../lib/entity/domain-names.php)
* See Also:
  * [\Automattic\Domain_Services_Client\Entity\Domain_Name](../classes/Automattic-Domain-Services-Client-Entity-Domain-Name.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  ...domain_names) : mixed
```

##### Summary

Constructs a `Domain_Names` entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain_names** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |

##### Returns:

```
mixed
```

---

<a id="method_add_domain_name"></a>
### add_domain_name

```
public add_domain_name(\Automattic\Domain_Services_Client\Entity\Domain_name  domain_name) : $this
```

##### Summary

Adds a domain name to the list of domain names

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain_name** | \Automattic\Domain_Services_Client\Entity\Domain_name |  |

##### Returns:

```
$this
```

---

<a id="method_get_domain_names"></a>
### get_domain_names

```
public get_domain_names() : \Automattic\Domain_Services_Client\Entity\Domain_Name[]
```

##### Summary

Gets the list of domain names

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name[]
```
