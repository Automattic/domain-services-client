# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Dns_Record_Set

## Summary:

A set of DNS records that share the same name, type and TTL


---

### Methods

* public [__construct()](#method___construct)
* public [get_data()](#method_get_data)
* public [get_name()](#method_get_name)
* public [get_ttl()](#method_get_ttl)
* public [get_type()](#method_get_type)

---

### Details

* File: [lib/entity/dns-record-set.php](../../lib/entity/dns-record-set.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  name, \Automattic\Domain_Services_Client\Entity\Dns_Record_Type  type, int  ttl, array  data) : mixed
```

##### Summary

Constructs a Dns_Record_Set entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$name** | string |  |
| **$type** | \Automattic\Domain_Services_Client\Entity\Dns_Record_Type |  |
| **$ttl** | int |  |
| **$data** | array |  |

##### Returns:

```
mixed
```

---

<a id="method_get_data"></a>
### get_data

```
public get_data() : array
```

##### Summary

Returns the data of this DNS record set

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

##### Summary

Returns the name of this DNS record set

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

##### Summary

Returns the TTL of this DNS record set

##### Returns:

```
int
```

---

<a id="method_get_type"></a>
### get_type

```
public get_type() : \Automattic\Domain_Services_Client\Entity\Dns_Record_Type
```

##### Summary

Returns the type of this DNS record set

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Dns_Record_Type
```
