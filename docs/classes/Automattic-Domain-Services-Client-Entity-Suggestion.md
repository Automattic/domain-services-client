# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Suggestion

## Summary:

Domain name suggestion

## Description:

Used in the `Domain\Suggestions` response.


---

### Methods

* public [__construct()](#method___construct)
* public [get_domain_name()](#method_get_domain_name)
* public [get_reseller_register_fee()](#method_get_reseller_register_fee)
* public [get_reseller_renewal_fee()](#method_get_reseller_renewal_fee)
* public [is_available()](#method_is_available)
* public [is_premium()](#method_is_premium)
* public [is_zone_active()](#method_is_zone_active)

---

### Details

* File: [lib/entity/domain-suggestion.php](../../lib/entity/domain-suggestion.php)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Suggestions](../classes/Automattic-Domain-Services-Client-Response-Domain-Suggestions.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain_name, int  reseller_create_fee, int  reseller_renewal_fee, bool  is_premium = false, bool  is_available = true, mixed  zone_is_active = true) : mixed
```

##### Summary

Constructs a `Suggestion` entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain_name** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$reseller_create_fee** | int | 0 |
| **$reseller_renewal_fee** | int | 0 |
| **$is_premium** | bool | false |
| **$is_available** | bool | true |
| **$zone_is_active** | mixed | true |

##### Returns:

```
mixed
```

---

<a id="method_get_domain_name"></a>
### get_domain_name

```
public get_domain_name() : \Automattic\Domain_Services_Client\Entity\Domain_Name
```

##### Summary

Returns the domain name suggestion

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
```

---

<a id="method_get_reseller_register_fee"></a>
### get_reseller_register_fee

```
public get_reseller_register_fee() : int
```

##### Summary

Returns the reseller fee to register this domain

##### Returns:

```
int
```

---

<a id="method_get_reseller_renewal_fee"></a>
### get_reseller_renewal_fee

```
public get_reseller_renewal_fee() : int
```

##### Summary

Returns the reseller fee to renew this domain

##### Returns:

```
int
```

---

<a id="method_is_available"></a>
### is_available

```
public is_available() : bool
```

##### Summary

Returns whether the domain suggestion is available

##### Returns:

```
bool
```

---

<a id="method_is_premium"></a>
### is_premium

```
public is_premium() : bool
```

##### Summary

Returns whether the domain suggestion is premium

##### Returns:

```
bool
```

---

<a id="method_is_zone_active"></a>
### is_zone_active

```
public is_zone_active() : bool
```

##### Summary

Returns whether the domain suggestion&#039;s zone (TLD) is active for the reseller

##### Returns:

```
bool
```
