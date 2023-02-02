# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Whois_Privacy

## Summary:

Define a valid privacy setting to be used for a domain


---

### Constants
* public [DISCLOSE_CONTACT_INFO](#constant_DISCLOSE_CONTACT_INFO)
* public [REDACT_CONTACT_INFO](#constant_REDACT_CONTACT_INFO)
* public [ENABLE_PRIVACY_SERVICE](#constant_ENABLE_PRIVACY_SERVICE)

---

### Methods

* public [__construct()](#method___construct)
* public [get_setting()](#method_get_setting)

---

### Details

* File: [lib/entity/whois-privacy.php](../../lib/entity/whois-privacy.php)

---

## Constants
<a id="constant_DISCLOSE_CONTACT_INFO"></a>
###### DISCLOSE_CONTACT_INFO
Contact information is publicly visible in whois query results

```
DISCLOSE_CONTACT_INFO = 'disclose_contact_info'
```


<a id="constant_REDACT_CONTACT_INFO"></a>
###### REDACT_CONTACT_INFO
Contact information is redacted in whois query results (for each field a generic &quot;REDACTED FOR PRIVACY&quot; is
displayed)

```
REDACT_CONTACT_INFO = 'redact_contact_info'
```


<a id="constant_ENABLE_PRIVACY_SERVICE"></a>
###### ENABLE_PRIVACY_SERVICE
Third party (privacy service provider) contact information is displayed in whois query results.

```
ENABLE_PRIVACY_SERVICE = 'enable_privacy_service'
```



---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  setting) : mixed
```

##### Summary

Constructs a `Whois_Privacy` entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$setting** | string |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_setting"></a>
### get_setting

```
public get_setting() : string
```

##### Summary

Return the whois privacy setting

##### Returns:

```
string
```
