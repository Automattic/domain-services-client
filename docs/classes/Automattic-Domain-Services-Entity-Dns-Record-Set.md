# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Dns_Record_Set

## Summary:

A set of DNS records that share the same name, type and TTL


---

### Methods

* public [__construct()](#method___construct)
* public [__toString()](#method___toString)
* public [from_array()](#method_from_array)
* public [get_data()](#method_get_data)
* public [get_name()](#method_get_name)
* public [get_ttl()](#method_get_ttl)
* public [get_type()](#method_get_type)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/entity/dns-record-set.php](../../lib/entity/dns-record-set.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  name, \Automattic\Domain_Services\Entity\Dns_Record_Type  type, int  ttl, array  data) : mixed
```

##### SummaryConstructs a Dns_Record_Set entity
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$name** | string |  |
| **$type** | \Automattic\Domain_Services\Entity\Dns_Record_Type |  |
| **$ttl** | int |  |
| **$data** | array |  |

##### Returns:

```
mixed
```

---

<a id="method___toString"></a>
### __toString

```
public __toString() : string
```

##### SummaryReturns a string representation of this DNS record set
##### Returns:

```
string
```

---

<a id="method_from_array"></a>
### from_array

```
static public from_array(array  data) : static
```

##### SummaryConstructs a Dns_Record_Set entity from an associative array containing a DNS record set
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$data** | array |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
static
```

---

<a id="method_get_data"></a>
### get_data

```
public get_data() : array
```

##### SummaryReturns the data of this DNS record set
##### Returns:

```
array
```

---

<a id="method_get_name"></a>
### get_name

```
public get_name() : string
```

##### SummaryReturns the name of this DNS record set
##### Returns:

```
string
```

---

<a id="method_get_ttl"></a>
### get_ttl

```
public get_ttl() : int
```

##### SummaryReturns the TTL of this DNS record set
##### Returns:

```
int
```

---

<a id="method_get_type"></a>
### get_type

```
public get_type() : \Automattic\Domain_Services\Entity\Dns_Record_Type
```

##### SummaryReturns the type of this DNS record set
##### Returns:

```
\Automattic\Domain_Services\Entity\Dns_Record_Type
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### SummaryReturns an associative array containing this DNS record set&#039;s values
##### Returns:

```
array
```
