# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Event](../namespaces/automattic-domain-services-event.md)[\Domain](../namespaces/automattic-domain-services-event-domain.md)[\Register](../namespaces/automattic-domain-services-event-domain-register.md)\Success

## Summary:

Success event for a `Domain\Register` command.

## Description:

This event is sent when a register operation succeeds.


---

### Methods

* public [__construct()](#method___construct)
* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_agp_end_date()](#method_get_agp_end_date)
* public [get_contacts()](#method_get_contacts)
* public [get_created_date()](#method_get_created_date)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_domain()](#method_get_domain)
* public [get_domain_status()](#method_get_domain_status)
* public [get_event_class()](#method_get_event_class)
* public [get_event_data()](#method_get_event_data)
* public [get_event_date()](#method_get_event_date)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_expiration_date()](#method_get_expiration_date)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)
* public [get_renewable_until()](#method_get_renewable_until)
* public [get_unverified_contact_suspension_date()](#method_get_unverified_contact_suspension_date)

---

### Details

* File: [lib/event/domain/register/success.php](../../lib/event/domain/register/success.php)
* Implements:
  * [\Automattic\Domain_Services\Event\Event_Interface](../classes/Automattic-Domain-Services-Event-Event-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Event\Data_Trait](../classes/Automattic-Domain-Services-Event-Data-Trait.md)
  * [\Automattic\Domain_Services\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Event-Object-Type-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Command\Domain\Register](../classes/Automattic-Domain-Services-Command-Domain-Register.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
final public __construct(array  data = []) : mixed
```

##### Summary

Constructs an event object

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$data** | array | [] |

##### Returns:

```
mixed
```

---

<a id="method_get_acknowledged_date"></a>
### get_acknowledged_date

```
public get_acknowledged_date() : \DateTimeInterface|null
```

##### Summary

Gets the date this event was acknowledged.

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_agp_end_date"></a>
### get_agp_end_date

```
public get_agp_end_date() : \DateTimeInterface|null
```

##### Summary

Gets the date the domain will exit the Add Grace Period (AGP); null if no AGP is offered

##### Description

- If AGP is offered, the reseller may receive a credit for domains deleted during this period (usually 5 days
  after registration)
- Excessive cancellations in AGP may incur a penalty

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : null|\Automattic\Domain_Services\Entity\Domain_Contacts
```

##### Summary

Gets the contacts set for the domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
null|\Automattic\Domain_Services\Entity\Domain_Contacts
```

---

<a id="method_get_created_date"></a>
### get_created_date

```
public get_created_date() : null|\DateTimeInterface
```

##### Summary

Gets the date the domain was created

##### Returns:

```
null|\DateTimeInterface
```

---

<a id="method_get_data_by_key"></a>
### get_data_by_key

```
final public get_data_by_key(string  key) : array|mixed|null
```

##### Summary

Gets the value of the event data specified by the given key.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |

##### Returns:

```
array|mixed|null
```

---

<a id="method_get_domain"></a>
### get_domain

```
final public get_domain() : \Automattic\Domain_Services\Entity\Domain_Name
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Name
```

---

<a id="method_get_domain_status"></a>
### get_domain_status

```
public get_domain_status() : \Automattic\Domain_Services\Entity\Epp_Status_Codes
```

##### Summary

Gets the list of domain statuses

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Entity\Epp_Status_Codes
```

---

<a id="method_get_event_class"></a>
### get_event_class

```
public get_event_class() : string
```

##### Summary

Gets the event class

##### Returns:

```
string
```

---

<a id="method_get_event_data"></a>
### get_event_data

```
public get_event_data() : array
```

##### Summary

Gets all the event data as an array

##### Throws:

| Type | Description |
|------|-------------|
| \JsonException |  |

##### Returns:

```
array
```

---

<a id="method_get_event_date"></a>
### get_event_date

```
public get_event_date() : \DateTimeInterface
```

##### Summary

Gets the date this event was generated.

##### Returns:

```
\DateTimeInterface
```

---

<a id="method_get_event_subclass"></a>
### get_event_subclass

```
public get_event_subclass() : string
```

##### Summary

Gets the event subclass

##### Returns:

```
string
```

---

<a id="method_get_expiration_date"></a>
### get_expiration_date

```
public get_expiration_date() : null|\DateTimeInterface
```

##### Summary

Gets the domain expiration date

##### Returns:

```
null|\DateTimeInterface
```

---

<a id="method_get_id"></a>
### get_id

```
public get_id() : int
```

##### Summary

Gets the event ID

##### Returns:

```
int
```

---

<a id="method_get_object_id"></a>
### get_object_id

```
public get_object_id() : string
```

##### Summary

Gets the ID of the object that this event references.

##### Description

- The contact ID for a contact object type
- The domain name for a domain object type

##### Returns:

```
string
```

---

<a id="method_get_object_type"></a>
### get_object_type

```
public get_object_type() : string
```

##### Summary

Gets the type of object that this event references (ex. &#039;domain&#039; or &#039;contact&#039;)

##### Returns:

```
string
```

---

<a id="method_get_renewable_until"></a>
### get_renewable_until

```
public get_renewable_until() : null|\DateTimeInterface
```

##### Summary

Get the last date to renew the domain

##### Returns:

```
null|\DateTimeInterface
```

---

<a id="method_get_unverified_contact_suspension_date"></a>
### get_unverified_contact_suspension_date

```
public get_unverified_contact_suspension_date() : null|\DateTimeInterface
```

##### Summary

Gets the date when the domain will be suspended if the contact information is not verified

##### Returns:

```
null|\DateTimeInterface
```
