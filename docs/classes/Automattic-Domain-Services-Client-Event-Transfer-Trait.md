# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)\Transfer_Trait

## Summary:

Trait that adds transfer-related methods to an event.


---

### Methods

* public [get_auto_nack()](#method_get_auto_nack)
* public [get_current_registrar()](#method_get_current_registrar)
* public [get_execute_date()](#method_get_execute_date)
* public [get_request_date()](#method_get_request_date)
* public [get_requesting_registrar()](#method_get_requesting_registrar)
* public [get_transfer_status()](#method_get_transfer_status)

---

### Details

* File: [lib/event/transfer-trait.php](../../lib/event/transfer-trait.php)

---

## Methods

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
