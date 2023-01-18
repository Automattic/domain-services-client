# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Domain_Contact

## Summary:

Represents a domain contact

## Description:

Represents one of the domain's contacts and its privacy setting.


---

### Methods

* public [__construct()](#method___construct)
* public [get_contact_disclosure()](#method_get_contact_disclosure)
* public [get_contact_id()](#method_get_contact_id)
* public [get_contact_information()](#method_get_contact_information)
* public [set_contact_disclosure()](#method_set_contact_disclosure)
* public [set_contact_id()](#method_set_contact_id)
* public [set_contact_information()](#method_set_contact_information)

---

### Details

* File: [lib/entity/domain-contact.php](../../lib/entity/domain-contact.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Contact_Id|null  contact_id = null, \Automattic\Domain_Services\Entity\Contact_Information|null  contact_info = null, \Automattic\Domain_Services\Entity\Contact_Disclosure|null  disclose_fields = null) : mixed
```

##### Summary

Constructs a `Domain_Contact` entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_id** | \Automattic\Domain_Services\Entity\Contact_Id|null | null |
| **$contact_info** | \Automattic\Domain_Services\Entity\Contact_Information|null | null |
| **$disclose_fields** | \Automattic\Domain_Services\Entity\Contact_Disclosure|null | null |

##### Returns:

```
mixed
```

---

<a id="method_get_contact_disclosure"></a>
### get_contact_disclosure

```
public get_contact_disclosure() : \Automattic\Domain_Services\Entity\Contact_Disclosure
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Disclosure
```

---

<a id="method_get_contact_id"></a>
### get_contact_id

```
public get_contact_id() : \Automattic\Domain_Services\Entity\Contact_Id|null
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Id|null
```

---

<a id="method_get_contact_information"></a>
### get_contact_information

```
public get_contact_information() : \Automattic\Domain_Services\Entity\Contact_Information|null
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Information|null
```

---

<a id="method_set_contact_disclosure"></a>
### set_contact_disclosure

```
public set_contact_disclosure(\Automattic\Domain_Services\Entity\Contact_Disclosure  contact_disclosure) : void
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_disclosure** | \Automattic\Domain_Services\Entity\Contact_Disclosure |  |

##### Returns:

```
void
```

---

<a id="method_set_contact_id"></a>
### set_contact_id

```
public set_contact_id(\Automattic\Domain_Services\Entity\Contact_Id|null  contact_id) : void
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_id** | \Automattic\Domain_Services\Entity\Contact_Id|null |  |

##### Returns:

```
void
```

---

<a id="method_set_contact_information"></a>
### set_contact_information

```
public set_contact_information(\Automattic\Domain_Services\Entity\Contact_Information|null  contact_information) : void
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_information** | \Automattic\Domain_Services\Entity\Contact_Information|null |  |

##### Returns:

```
void
```
