# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Renew](../namespaces/automattic-domain-services-client-event-domain-renew.md)\Success

## Summary:

Domain renewed successfully event

## Description:

This event is generated when a domain renewal operation has completed successfully at the server.


---

### Methods

* public [__construct()](#method___construct)
* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_domain()](#method_get_domain)
* public [get_domain_status()](#method_get_domain_status)
* public [get_event_class()](#method_get_event_class)
* public [get_event_client_txn_id()](#method_get_event_client_txn_id)
* public [get_event_date()](#method_get_event_date)
* public [get_event_server_txn_id()](#method_get_event_server_txn_id)
* public [get_event_status()](#method_get_event_status)
* public [get_event_status_description()](#method_get_event_status_description)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_expiration_date()](#method_get_expiration_date)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)
* public [get_renewable_until()](#method_get_renewable_until)

---

### Details

* File: [lib/event/domain/renew/success.php](../../lib/event/domain/renew/success.php)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Data_Trait](../classes/Automattic-Domain-Services-Client-Event-Data-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Domain\Renew](../classes/Automattic-Domain-Services-Client-Command-Domain-Renew.md)

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

##### Summary

Returns the domain name object.

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
```

---

<a id="method_get_domain_status"></a>
### get_domain_status

```
public get_domain_status() : \Automattic\Domain_Services_Client\Entity\Epp_Status_Codes
```

##### Summary

Returns the domain status after the renewal operation

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Epp_Status_Codes
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

<a id="method_get_event_client_txn_id"></a>
### get_event_client_txn_id

```
public get_event_client_txn_id() : string
```

##### Summary

Gets the client_txn_id from the command related to this event, if any

##### Returns:

```
string
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

<a id="method_get_event_server_txn_id"></a>
### get_event_server_txn_id

```
public get_event_server_txn_id() : string
```

##### Summary

Gets the server_txn_id from the command related to this event, if any

##### Returns:

```
string
```

---

<a id="method_get_event_status"></a>
### get_event_status

```
public get_event_status() : int
```

##### Summary

Gets the status code for this event

##### Returns:

```
int
```

---

<a id="method_get_event_status_description"></a>
### get_event_status_description

```
public get_event_status_description() : string
```

##### Summary

Gets a description of the status code meaning

##### Returns:

```
string
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
public get_expiration_date() : \DateTimeInterface|null
```

##### Summary

Returns the domain expiration date after the renewal operation

##### Returns:

```
\DateTimeInterface|null
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
public get_renewable_until() : \DateTimeInterface|null
```

##### Summary

Returns the date until which the domain can be renewed after the renewal operation

##### Returns:

```
\DateTimeInterface|null
```
