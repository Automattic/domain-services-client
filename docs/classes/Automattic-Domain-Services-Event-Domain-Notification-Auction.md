# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Event](../namespaces/automattic-domain-services-event.md)[\Domain](../namespaces/automattic-domain-services-event-domain.md)[\Notification](../namespaces/automattic-domain-services-event-domain-notification.md)\Auction

## Summary:

Domain entered auction phase event

## Description:

- This event is generated when a domain enters an expiry auction phase
- There are three domain auction phases
    - `parked` - 5 days after expiration, the domain's name servers and DNS records will be changed to our auction
       partners' servers
    - `submitted` - 21 days after expiration, the domain is appraised by our auction partners
    - `active` - 30 days after expiration, if the domain is selected for auction, is when the actual auction starts.
      This phase lasts until day 43 after the domain expiration date
- After day 43, if the domain was not sold in auction, it will enter the redemption phase as usual
- This event contains two properties:
    - `auction_status` - current expiry auction status phase (will be either `PARKED`, `SUBMITTED` or `ACTIVE`),
      can be retrieved using the `get_auction_status` method
    - `auction_status_end_date` - date until which the domain is in the current auction phase, can be retrieved using
      the `get_auction_status_end_date` method


---

### Methods

* public [__construct()](#method___construct)
* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_auction_status()](#method_get_auction_status)
* public [get_auction_status_end_date()](#method_get_auction_status_end_date)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_domain()](#method_get_domain)
* public [get_event_class()](#method_get_event_class)
* public [get_event_data()](#method_get_event_data)
* public [get_event_date()](#method_get_event_date)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)

---

### Details

* File: [lib/event/domain/notification/auction.php](../../lib/event/domain/notification/auction.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Event-Event-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Data_Trait](../classes/Automattic-Domain-Services-Event-Data-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Event-Object-Type-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Event\Domain\Notification\Redemption](../classes/Automattic-Domain-Services-Event-Domain-Notification-Redemption.md)

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

<a id="method_get_auction_status"></a>
### get_auction_status

```
public get_auction_status() : string|null
```

##### Summary

This should be one of PARKED, SUBMITTED, ACTIVE

##### Returns:

```
string|null
```

---

<a id="method_get_auction_status_end_date"></a>
### get_auction_status_end_date

```
public get_auction_status_end_date() : \DateTimeImmutable|null
```

##### Summary

This is the date at which the domain will exit the current auction state

##### Returns:

```
\DateTimeImmutable|null
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
