# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Domain_Contacts

## Summary:

Represents all contact types for a domain name


---

### Constants
* public [OWNER](#constant_OWNER)
* public [ADMIN](#constant_ADMIN)
* public [TECH](#constant_TECH)
* public [BILLING](#constant_BILLING)

---

### Methods

* public [__construct()](#method___construct)
* public [get_admin()](#method_get_admin)
* public [get_billing()](#method_get_billing)
* public [get_by_key()](#method_get_by_key)
* public [get_owner()](#method_get_owner)
* public [get_tech()](#method_get_tech)
* public [get_valid_contact_types()](#method_get_valid_contact_types)
* public [is_empty()](#method_is_empty)
* public [set_admin()](#method_set_admin)
* public [set_billing()](#method_set_billing)
* public [set_by_key()](#method_set_by_key)
* public [set_owner()](#method_set_owner)
* public [set_tech()](#method_set_tech)

---

### Details

* File: [lib/entity/domain-contacts.php](../../lib/entity/domain-contacts.php)
* Implements:
  * [\Iterator](../classes/Iterator.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Entity\Domain_Contact](../classes/Automattic-Domain-Services-Client-Entity-Domain-Contact.md)

---

## Constants
<a id="constant_OWNER"></a>
###### OWNER
```
OWNER = 'owner'
```


<a id="constant_ADMIN"></a>
###### ADMIN
```
ADMIN = 'admin'
```


<a id="constant_TECH"></a>
###### TECH
```
TECH = 'tech'
```


<a id="constant_BILLING"></a>
###### BILLING
```
BILLING = 'billing'
```



---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Contact|null  owner = null, \Automattic\Domain_Services_Client\Entity\Domain_Contact|null  admin = null, \Automattic\Domain_Services_Client\Entity\Domain_Contact|null  tech = null, \Automattic\Domain_Services_Client\Entity\Domain_Contact|null  billing = null) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$owner** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null | null |
| **$admin** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null | null |
| **$tech** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null | null |
| **$billing** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null | null |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_admin"></a>
### get_admin

```
public get_admin() : \Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

##### Summary

Gets the domain admin&#039;s contact

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

---

<a id="method_get_billing"></a>
### get_billing

```
public get_billing() : \Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

##### Summary

Gets the domain billing&#039;s contact

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

---

<a id="method_get_by_key"></a>
### get_by_key

```
public get_by_key(string  key) : \Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

##### Summary

Gets domain contact by type

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

---

<a id="method_get_owner"></a>
### get_owner

```
public get_owner() : \Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

##### Summary

Gets the domain owner&#039;s contact

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

---

<a id="method_get_tech"></a>
### get_tech

```
public get_tech() : \Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

##### Summary

Gets the domain tech&#039;s contact

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contact|null
```

---

<a id="method_get_valid_contact_types"></a>
### get_valid_contact_types

```
static public get_valid_contact_types() : string[]
```

##### Summary

Returns a list of the valid contact types

##### Returns:

```
string[]
```

---

<a id="method_is_empty"></a>
### is_empty

```
public is_empty() : bool
```

##### Returns:

```
bool
```

---

<a id="method_set_admin"></a>
### set_admin

```
public set_admin(\Automattic\Domain_Services_Client\Entity\Domain_Contact|null  admin) : void
```

##### Summary

Sets the domain admin&#039;s contact

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$admin** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```

---

<a id="method_set_billing"></a>
### set_billing

```
public set_billing(\Automattic\Domain_Services_Client\Entity\Domain_Contact|null  billing) : void
```

##### Summary

Sets the domain billing&#039;s contact

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$billing** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```

---

<a id="method_set_by_key"></a>
### set_by_key

```
public set_by_key(string  key, \Automattic\Domain_Services_Client\Entity\Domain_Contact  domain_contact) : void
```

##### Summary

Sets domain contact by type

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |
| **$domain_contact** | \Automattic\Domain_Services_Client\Entity\Domain_Contact |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```

---

<a id="method_set_owner"></a>
### set_owner

```
public set_owner(\Automattic\Domain_Services_Client\Entity\Domain_Contact  owner) : void
```

##### Summary

Sets the domain owner&#039;s contact

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$owner** | \Automattic\Domain_Services_Client\Entity\Domain_Contact |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```

---

<a id="method_set_tech"></a>
### set_tech

```
public set_tech(\Automattic\Domain_Services_Client\Entity\Domain_Contact|null  tech) : void
```

##### Summary

Sets the domain tech&#039;s contact

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$tech** | \Automattic\Domain_Services_Client\Entity\Domain_Contact|null |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
void
```
