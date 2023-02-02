# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Transfer](../namespaces/automattic-domain-services-client-event-domain-transfer.md)[\In](../namespaces/automattic-domain-services-client-event-domain-transfer-in.md)\Pending

## Summary:

Inbound domain transfer start event

## Description:

This event is generated when a domain transfer from another registrar to the reseller's account is started.


---

### Methods

* public [__construct()](#method___construct)
* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_auto_nack()](#method_get_auto_nack)
* public [get_current_registrar()](#method_get_current_registrar)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_domain()](#method_get_domain)
* public [get_event_class()](#method_get_event_class)
* public [get_event_data()](#method_get_event_data)
* public [get_event_date()](#method_get_event_date)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_execute_date()](#method_get_execute_date)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)
* public [get_request_date()](#method_get_request_date)
* public [get_requesting_registrar()](#method_get_requesting_registrar)
* public [get_transfer_status()](#method_get_transfer_status)

---

### Details

* File: [lib/event/domain/transfer/in/pending.php](../../lib/event/domain/transfer/in/pending.php)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Data_Trait](../classes/Automattic-Domain-Services-Client-Event-Data-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Transfer_Trait](../classes/Automattic-Domain-Services-Client-Event-Transfer-Trait.md)

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

<a id="method_get_auto_nack"></a>
### get_auto_nack

```
final public get_auto_nack() : bool|null
```

##### Summary

Gets whether the domain transfer associated with the event was automatically rejected.

##### Returns:

```
bool|null
```

---

<a id="method_get_current_registrar"></a>
### get_current_registrar

```
final public get_current_registrar() : string|null
```

##### Summary

Gets the current registrar of the domain associated with the event.

##### Returns:

```
string|null
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

##### Summary

Returns the domain name object.

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

<a id="method_get_execute_date"></a>
### get_execute_date

```
final public get_execute_date() : \DateTimeImmutable|null
```

##### Summary

Gets the date the transfer was executed.

##### Returns:

```
\DateTimeImmutable|null
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

<a id="method_get_request_date"></a>
### get_request_date

```
final public get_request_date() : \DateTimeImmutable|null
```

##### Summary

Gets the date the transfer was requested.

##### Returns:

```
\DateTimeImmutable|null
```

---

<a id="method_get_requesting_registrar"></a>
### get_requesting_registrar

```
final public get_requesting_registrar() : string|null
```

##### Summary

Gets the requesting registrar for the domain transfer associated with the event.

##### Returns:

```
string|null
```

---

<a id="method_get_transfer_status"></a>
### get_transfer_status

```
final public get_transfer_status() : string|null
```

##### Summary

Gets the status of the transfer.

##### Returns:

```
string|null
```
