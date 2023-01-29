# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Event](../namespaces/automattic-domain-services-event.md)[\Domain](../namespaces/automattic-domain-services-event-domain.md)[\Set](../namespaces/automattic-domain-services-event-domain-set.md)[\Privacy](../namespaces/automattic-domain-services-event-domain-set-privacy.md)\Success

## Summary:

Success event for a `Domain\Set\Privacy command

## Description:

- This event is generated when a privacy setting update succeeds at the server.
- Contains a `privacy_setting` property with the privacy option that was set at the registry


---

### Methods

* public [__construct()](#method___construct)
* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_domain()](#method_get_domain)
* public [get_event_class()](#method_get_event_class)
* public [get_event_data()](#method_get_event_data)
* public [get_event_date()](#method_get_event_date)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)
* public [get_privacy_setting()](#method_get_privacy_setting)

---

### Details

* File: [lib/event/domain/set/privacy/success.php](../../lib/event/domain/set/privacy/success.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Event-Event-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Data_Trait](../classes/Automattic-Domain-Services-Event-Data-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Event-Object-Type-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Domain\Set\Privacy](../classes/Automattic-Domain-Services-Command-Domain-Set-Privacy.md)

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
final public get_domain() : \Automattic\Domain_Services_Client\Entity\Domain_Name
```

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
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

<a id="method_get_privacy_setting"></a>
### get_privacy_setting

```
public get_privacy_setting() : \Automattic\Domain_Services_Client\Entity\Whois_Privacy|null
```

##### Summary

Returns the Whois_Privacy setting that was set for this domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Whois_Privacy|null
```
