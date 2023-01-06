# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Dns_Record_Sets

## Summary:

Set of sets of DNS records


---

### Methods

* public [__construct()](#method___construct)
* public [add_record_set()](#method_add_record_set)
* public [current()](#method_current)
* public [from_array()](#method_from_array)
* public [key()](#method_key)
* public [next()](#method_next)
* public [rewind()](#method_rewind)
* public [to_array()](#method_to_array)
* public [valid()](#method_valid)

---

### Details

* File: [lib/entity/dns-record-sets.php](../../lib/entity/dns-record-sets.php)
* Implements:
  * [\Iterator](../classes/Iterator.md)
* See Also:
  * [\Automattic\Domain_Services\Entity\Dns_Record_Set](../classes/Automattic-Domain-Services-Entity-Dns-Record-Set.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Dns_Record_Set  ...dns_record_sets) : mixed
```

##### Summary

Constructs a Dns_Record_Sets entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$dns_record_sets** | \Automattic\Domain_Services\Entity\Dns_Record_Set |  |

##### Returns:

```
mixed
```

---

<a id="method_add_record_set"></a>
### add_record_set

```
public add_record_set(\Automattic\Domain_Services\Entity\Dns_Record_Set  dns_record_set) : void
```

##### Summary

Adds a Dns_Record_Set to this entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$dns_record_set** | \Automattic\Domain_Services\Entity\Dns_Record_Set |  |

##### Returns:

```
void
```

---

<a id="method_current"></a>
### current

```
public current() : ?\Automattic\Domain_Services\Entity\Dns_Record_Set
```

##### Summary

Functions to implement the Iterator interface

##### Returns:

```
?\Automattic\Domain_Services\Entity\Dns_Record_Set
```

---

<a id="method_from_array"></a>
### from_array

```
static public from_array(array  dns_record_sets_data) : static
```

##### Summary

Constructs a DNS_Record_Sets entity from an array of DNS record set values

##### See Also:

 * [\Automattic\Domain_Services\Entity\Dns_Record_Set](../classes/Automattic-Domain-Services-Entity-Dns-Record-Set.md)

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$dns_record_sets_data** | array |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
static
```

---

<a id="method_key"></a>
### key

```
public key() : int|null
```

##### Summary

Part of the iterator interface implementation

##### Returns:

```
int|null
```

---

<a id="method_next"></a>
### next

```
public next() : void
```

##### Summary

Part of the iterator interface implementation

##### Returns:

```
void
```

---

<a id="method_rewind"></a>
### rewind

```
public rewind() : void
```

##### Summary

Part of the iterator interface implementation

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

##### Summary

Returns each Dns_Record_Set in this entity as an array

##### Returns:

```
array
```

---

<a id="method_valid"></a>
### valid

```
public valid() : bool
```

##### Summary

Part of the iterator interface implementation

##### Returns:

```
bool
```
