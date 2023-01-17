# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Contact_Information

## Summary:

The contact information for domain registrants.


---

### Methods

* public [__construct()](#method___construct)
* public [get_address_1()](#method_get_address_1)
* public [get_address_2()](#method_get_address_2)
* public [get_by_key()](#method_get_by_key)
* public [get_city()](#method_get_city)
* public [get_country_code()](#method_get_country_code)
* public [get_email()](#method_get_email)
* public [get_fax()](#method_get_fax)
* public [get_first_name()](#method_get_first_name)
* public [get_last_name()](#method_get_last_name)
* public [get_organization()](#method_get_organization)
* public [get_phone()](#method_get_phone)
* public [get_postal_code()](#method_get_postal_code)
* public [get_state()](#method_get_state)
* public [set_by_key()](#method_set_by_key)

---

### Details

* File: [lib/entity/contact-information.php](../../lib/entity/contact-information.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string|null  first_name = null, string|null  last_name = null, string|null  organization = null, string|null  address_1 = null, string|null  address_2 = null, string|null  postal_code = null, string|null  city = null, string|null  state = null, string|null  country_code = null, string|null  email = null, string|null  phone = null, string|null  fax = null) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$first_name** | string|null | null |
| **$last_name** | string|null | null |
| **$organization** | string|null | null |
| **$address_1** | string|null | null |
| **$address_2** | string|null | null |
| **$postal_code** | string|null | null |
| **$city** | string|null | null |
| **$state** | string|null | null |
| **$country_code** | string|null | null |
| **$email** | string|null | null |
| **$phone** | string|null | null |
| **$fax** | string|null | null |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_address_1"></a>
### get_address_1

```
public get_address_1() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_address_2"></a>
### get_address_2

```
public get_address_2() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_by_key"></a>
### get_by_key

```
public get_by_key(string  key) : string|null
```

##### Summary

Get the contact data value fot the given key

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |

##### Returns:

```
string|null
```

---

<a id="method_get_city"></a>
### get_city

```
public get_city() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_country_code"></a>
### get_country_code

```
public get_country_code() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_email"></a>
### get_email

```
public get_email() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_fax"></a>
### get_fax

```
public get_fax() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_first_name"></a>
### get_first_name

```
public get_first_name() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_last_name"></a>
### get_last_name

```
public get_last_name() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_organization"></a>
### get_organization

```
public get_organization() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_phone"></a>
### get_phone

```
public get_phone() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_postal_code"></a>
### get_postal_code

```
public get_postal_code() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_get_state"></a>
### get_state

```
public get_state() : string|null
```

##### Returns:

```
string|null
```

---

<a id="method_set_by_key"></a>
### set_by_key

```
public set_by_key(string  key, string|null  contact_item_value) : \Automattic\Domain_Services\Entity\Contact_Information
```

##### Summary

Set a contact data value with a given key.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |
| **$contact_item_value** | string|null |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Information
```
