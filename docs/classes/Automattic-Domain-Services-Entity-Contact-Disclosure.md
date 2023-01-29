# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Contact_Disclosure

## Summary:

The list of domain contact fields to disclose in the Whois results


---

### Constants
* public [NONE](#constant_NONE)
* public [ALL](#constant_ALL)
* public [VALID_DISCLOSURE_SETTINGS](#constant_VALID_DISCLOSURE_SETTINGS)

---

### Methods

* public [__construct()](#method___construct)
* public [get_disclose_fields()](#method_get_disclose_fields)

---

### Details

* File: [lib/entity/contact-disclosure.php](../../lib/entity/contact-disclosure.php)

---

## Constants
<a id="constant_NONE"></a>
###### NONE
```
NONE = 'none'
```


<a id="constant_ALL"></a>
###### ALL
```
ALL = 'all'
```


<a id="constant_VALID_DISCLOSURE_SETTINGS"></a>
###### VALID_DISCLOSURE_SETTINGS
```
VALID_DISCLOSURE_SETTINGS = [self::NONE, self::ALL]
```



---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  disclose_fields) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$disclose_fields** | string |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_disclose_fields"></a>
### get_disclose_fields

```
public get_disclose_fields() : string
```

##### Summary

Get the disclosed fields as a comma delimited list.

##### Returns:

```
string
```
