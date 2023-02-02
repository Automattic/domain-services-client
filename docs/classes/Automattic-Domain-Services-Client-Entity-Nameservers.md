# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Nameservers

## Summary:

Set of name servers


---

### Methods

* public [__construct()](#method___construct)
* public [add_nameserver()](#method_add_nameserver)

---

### Details

* File: [lib/entity/nameservers.php](../../lib/entity/nameservers.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  ...nameservers) : mixed
```

##### Summary

Constructs the Nameservers entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$nameservers** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_add_nameserver"></a>
### add_nameserver

```
public add_nameserver(\Automattic\Domain_Services_Client\Entity\Domain_Name  nameserver) : void
```

##### Summary

Adds a name server to the list of name servers

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$nameserver** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```
