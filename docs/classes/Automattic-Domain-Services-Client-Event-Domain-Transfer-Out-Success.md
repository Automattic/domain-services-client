# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Transfer](../namespaces/automattic-domain-services-client-event-domain-transfer.md)[\Out](../namespaces/automattic-domain-services-client-event-domain-transfer-out.md)\Success

## Summary:

Outbound domain transfer success event

## Description:

This event is generated when a domain transfer to another registrar is successful.


---

### Methods

* public [get_auto_nack()](#method_get_auto_nack)
* public [get_command_client_txn_id()](#method_get_command_client_txn_id)
* public [get_command_server_txn_id()](#method_get_command_server_txn_id)
* public [get_command_status()](#method_get_command_status)
* public [get_command_status_description()](#method_get_command_status_description)
* public [get_current_registrar()](#method_get_current_registrar)
* public [get_domain()](#method_get_domain)
* public [get_execute_date()](#method_get_execute_date)
* public [get_request_date()](#method_get_request_date)
* public [get_requesting_registrar()](#method_get_requesting_registrar)
* public [get_transfer_status()](#method_get_transfer_status)

---

### Details

* File: [lib/event/domain/transfer/out/success.php](../../lib/event/domain/transfer/out/success.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md)
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Transfer_Trait](../classes/Automattic-Domain-Services-Client-Event-Transfer-Trait.md)

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

<a id="method_get_command_client_txn_id"></a>
### get_command_client_txn_id

```
public get_command_client_txn_id() : string
```

##### Summary

Gets the client_txn_id from the command related to this event, if any

##### Returns:

```
string
```

---

<a id="method_get_command_server_txn_id"></a>
### get_command_server_txn_id

```
public get_command_server_txn_id() : string
```

##### Summary

Gets the server_txn_id from the command related to this event, if any

##### Returns:

```
string
```

---

<a id="method_get_command_status"></a>
### get_command_status

```
public get_command_status() : int
```

##### Summary

Gets the status code for this event

##### Returns:

```
int
```

---

<a id="method_get_command_status_description"></a>
### get_command_status_description

```
public get_command_status_description() : string
```

##### Summary

Gets a description of the status code meaning

##### Returns:

```
string
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
