# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Restore](../namespaces/automattic-domain-services-client-event-domain-restore.md)\Success

## Summary:

Success event for a `Domain\Restore` command.

## Description:

This event is sent when a restore operation succeeds.


---

### Methods

* public [get_command_client_txn_id()](#method_get_command_client_txn_id)
* public [get_command_server_txn_id()](#method_get_command_server_txn_id)
* public [get_command_status()](#method_get_command_status)
* public [get_command_status_description()](#method_get_command_status_description)
* public [get_domain()](#method_get_domain)
* public [get_domain_status()](#method_get_domain_status)
* public [get_expiration_date()](#method_get_expiration_date)
* public [get_renewable_until()](#method_get_renewable_until)

---

### Details

* File: [lib/event/domain/restore/success.php](../../lib/event/domain/restore/success.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md)
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Domain\Restore](../classes/Automattic-Domain-Services-Client-Command-Domain-Restore.md)

---

## Methods

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

Gets the status of the domain immediately after the restore operation.

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Epp_Status_Codes
```

---

<a id="method_get_expiration_date"></a>
### get_expiration_date

```
public get_expiration_date() : \DateTimeInterface|null
```

##### Summary

Gets the expiration date of the domain after the restore operation.

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_renewable_until"></a>
### get_renewable_until

```
public get_renewable_until() : \DateTimeInterface|null
```

##### Summary

Gets the renewal date of the domain after the restore operation.

##### Returns:

```
\DateTimeInterface|null
```
