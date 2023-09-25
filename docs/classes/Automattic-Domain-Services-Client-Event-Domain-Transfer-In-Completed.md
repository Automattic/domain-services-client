# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Transfer](../namespaces/automattic-domain-services-client-event-domain-transfer.md)[\In](../namespaces/automattic-domain-services-client-event-domain-transfer-in.md)\Completed

## Summary:

Inbound domain transfer success event

## Description:

This event is generated when a domain transfer from another registrar to the reseller's account is successful.


---

### Methods

* public [get_auto_nack()](#method_get_auto_nack)
* public [get_command_client_txn_id()](#method_get_command_client_txn_id)
* public [get_command_server_txn_id()](#method_get_command_server_txn_id)
* public [get_command_status()](#method_get_command_status)
* public [get_command_status_description()](#method_get_command_status_description)
* public [get_created_date()](#method_get_created_date)
* public [get_current_registrar()](#method_get_current_registrar)
* public [get_domain()](#method_get_domain)
* public [get_execute_date()](#method_get_execute_date)
* public [get_expiration_date()](#method_get_expiration_date)
* public [get_renewable_until()](#method_get_renewable_until)
* public [get_request_date()](#method_get_request_date)
* public [get_requesting_registrar()](#method_get_requesting_registrar)
* public [get_transfer_status()](#method_get_transfer_status)
* public [get_transferlocked_until_date()](#method_get_transferlocked_until_date)
* public [get_unverified_contact_suspension_date()](#method_get_unverified_contact_suspension_date)

---

### Details

* File: [lib/event/domain/transfer/in/completed.php](../../lib/event/domain/transfer/in/completed.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md)
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Transfer_Trait](../classes/Automattic-Domain-Services-Client-Event-Transfer-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\TransferLocked_Trait](../classes/Automattic-Domain-Services-Client-Event-TransferLocked-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Renewable_Until_Trait](../classes/Automattic-Domain-Services-Client-Event-Renewable-Until-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Created_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Created-Date-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Expiration_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Expiration-Date-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Unverified_Contact_Suspension_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Unverified-Contact-Suspension-Date-Trait.md)

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

---

<a id="method_get_transferlocked_until_date"></a>
### get_transferlocked_until_date

```
public get_transferlocked_until_date() : \DateTimeInterface|null
```

##### Summary

Gets the date until when the domain is transfer locked

##### Returns:

```
\DateTimeInterface|null
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
