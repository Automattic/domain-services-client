# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Domain_Contact

## Summary:

Represents a domain contact

## Description:

Represents one of the domain's contacts and its privacy setting.


---

### Methods

* public [__construct()](#method___construct)
* public [from_array()](#method_from_array)
* public [get_contact_disclosure()](#method_get_contact_disclosure)
* public [get_contact_id()](#method_get_contact_id)
* public [get_contact_information()](#method_get_contact_information)
* public [set_contact_disclosure()](#method_set_contact_disclosure)
* public [set_contact_id()](#method_set_contact_id)
* public [set_contact_information()](#method_set_contact_information)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/entity/domain-contact.php](../../lib/entity/domain-contact.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(?\Automattic\Domain_Services\Entity\Contact_Id  contact_id = null, ?\Automattic\Domain_Services\Entity\Contact_Information  contact_info = null, ?\Automattic\Domain_Services\Entity\Contact_Disclosure  disclose_fields = null) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_id** | ?\Automattic\Domain_Services\Entity\Contact_Id | null |
| **$contact_info** | ?\Automattic\Domain_Services\Entity\Contact_Information | null |
| **$disclose_fields** | ?\Automattic\Domain_Services\Entity\Contact_Disclosure | null |

##### Returns:

```
mixed
```

---

<a id="method_from_array"></a>
### from_array

```
static public from_array(array  data) : static
```

##### Summary

Builds an instance from an array

##### Description

The array can include `contact_id`, `contact_information`, and/or `contact_disclosure`

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

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### Summary

Returns an array representation of this instance

##### Returns:

```
array
```
