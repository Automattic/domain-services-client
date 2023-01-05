# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Nameservers

## Summary:

Set of name servers


---

### Methods

* public [__construct()](#method___construct)
* public [add_nameserver()](#method_add_nameserver)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/entity/nameservers.php](../../lib/entity/nameservers.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  ...nameservers) : mixed
```

##### SummaryConstructs the Nameservers entity
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$nameservers** | \Automattic\Domain_Services\Entity\Domain_Name |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_add_nameserver"></a>
### add_nameserver

```
public add_nameserver(\Automattic\Domain_Services\Entity\Domain_Name  nameserver) : void
```

##### SummaryAdds a name server to the list of name servers
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$nameserver** | \Automattic\Domain_Services\Entity\Domain_Name |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### SummaryReturns the list os name servers as an array of strings
##### Returns:

```
array
```
