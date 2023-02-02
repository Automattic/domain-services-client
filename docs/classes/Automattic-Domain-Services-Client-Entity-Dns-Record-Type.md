# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Dns_Record_Type

## Summary:

Represents a DNS Record Type


---

### Constants
* public [A](#constant_A)
* public [AAAA](#constant_AAAA)
* public [ALIAS](#constant_ALIAS)
* public [CAA](#constant_CAA)
* public [CNAME](#constant_CNAME)
* public [MX](#constant_MX)
* public [NS](#constant_NS)
* public [PTR](#constant_PTR)
* public [TXT](#constant_TXT)
* public [SOA](#constant_SOA)
* public [SRV](#constant_SRV)
* public [VALID_RECORD_TYPES](#constant_VALID_RECORD_TYPES)

---

### Methods

* public [__construct()](#method___construct)
* public [get_type()](#method_get_type)

---

### Details

* File: [lib/entity/dns-record-type.php](../../lib/entity/dns-record-type.php)

---

## Constants
<a id="constant_A"></a>
###### A
```
A = 'A'
```


<a id="constant_AAAA"></a>
###### AAAA
```
AAAA = 'AAAA'
```


<a id="constant_ALIAS"></a>
###### ALIAS
```
ALIAS = 'ALIAS'
```


<a id="constant_CAA"></a>
###### CAA
```
CAA = 'CAA'
```


<a id="constant_CNAME"></a>
###### CNAME
```
CNAME = 'CNAME'
```


<a id="constant_MX"></a>
###### MX
```
MX = 'MX'
```


<a id="constant_NS"></a>
###### NS
```
NS = 'NS'
```


<a id="constant_PTR"></a>
###### PTR
```
PTR = 'PTR'
```


<a id="constant_TXT"></a>
###### TXT
```
TXT = 'TXT'
```


<a id="constant_SOA"></a>
###### SOA
```
SOA = 'SOA'
```


<a id="constant_SRV"></a>
###### SRV
```
SRV = 'SRV'
```


<a id="constant_VALID_RECORD_TYPES"></a>
###### VALID_RECORD_TYPES
```
VALID_RECORD_TYPES = [self::A, self::AAAA, self::ALIAS, self::CAA, self::CNAME, self::MX, self::NS, self::PTR, self::TXT, self::SOA, self::SRV]
```



---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  type) : mixed
```

##### Summary

Constructs a `Dns_Record_Type` entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$type** | string |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_type"></a>
### get_type

```
public get_type() : string
```

##### Summary

Returns the DNS record type

##### Returns:

```
string
```
