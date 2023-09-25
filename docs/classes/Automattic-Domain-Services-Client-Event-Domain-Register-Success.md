# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Register](../namespaces/automattic-domain-services-client-event-domain-register.md)\Success

## Summary:

Success event for a `Domain\Register` command.

## Description:

This event is sent when a register operation succeeds.


---

### Methods

* public [get_agp_end_date()](#method_get_agp_end_date)
* public [get_command_client_txn_id()](#method_get_command_client_txn_id)
* public [get_command_server_txn_id()](#method_get_command_server_txn_id)
* public [get_command_status()](#method_get_command_status)
* public [get_command_status_description()](#method_get_command_status_description)
* public [get_contacts()](#method_get_contacts)
* public [get_created_date()](#method_get_created_date)
* public [get_domain()](#method_get_domain)
* public [get_domain_status()](#method_get_domain_status)
* public [get_expiration_date()](#method_get_expiration_date)
* public [get_renewable_until()](#method_get_renewable_until)
* public [get_transferlocked_until_date()](#method_get_transferlocked_until_date)
* public [get_unverified_contact_suspension_date()](#method_get_unverified_contact_suspension_date)

---

### Details

* File: [lib/event/domain/register/success.php](../../lib/event/domain/register/success.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md)
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\TransferLocked_Trait](../classes/Automattic-Domain-Services-Client-Event-TransferLocked-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Renewable_Until_Trait](../classes/Automattic-Domain-Services-Client-Event-Renewable-Until-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Created_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Created-Date-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Expiration_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Expiration-Date-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Unverified_Contact_Suspension_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Unverified-Contact-Suspension-Date-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Domain\Register](../classes/Automattic-Domain-Services-Client-Command-Domain-Register.md)

---

## Methods

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

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : null|\Automattic\Domain_Services_Client\Entity\Domain_Contacts
```

##### Summary

Gets the contacts set for the domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
null|\Automattic\Domain_Services_Client\Entity\Domain_Contacts
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

Gets the list of domain statuses

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Epp_Status_Codes
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
