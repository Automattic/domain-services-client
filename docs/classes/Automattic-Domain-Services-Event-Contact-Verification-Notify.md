# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Event](../namespaces/automattic-domain-services-event.md)[\Contact](../namespaces/automattic-domain-services-event-contact.md)[\Verification](../namespaces/automattic-domain-services-event-contact-verification.md)\Notify

## Summary:

Verification notify event

## Description:

This event indicates a change in the contact's status. It's usually generated when a contact is marked as verified.


---

### Methods

* public [__construct()](#method___construct)
* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_contact_id()](#method_get_contact_id)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_event_class()](#method_get_event_class)
* public [get_event_data()](#method_get_event_data)
* public [get_event_date()](#method_get_event_date)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)
* public [is_verified()](#method_is_verified)

---

### Details

* File: [lib/event/contact/verification/notify.php](../../lib/event/contact/verification/notify.php)
* Uses Traits:
  * [\Automattic\Domain_Services\Event\Data_Trait](../classes/Automattic-Domain-Services-Event-Data-Trait.md)
  * [\Automattic\Domain_Services\Event\Object_Type_Contact_Trait](../classes/Automattic-Domain-Services-Event-Object-Type-Contact-Trait.md)

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

<a id="method_get_contact_id"></a>
### get_contact_id

```
final public get_contact_id() : \Automattic\Domain_Services\Entity\Contact_Id
```

##### Summary

Returns the contact object.

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Id
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

<a id="method_is_verified"></a>
### is_verified

```
public is_verified() : bool
```

##### Summary

Returns tha verification status of the contact

##### Returns:

```
bool
```
