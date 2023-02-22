# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Set](../namespaces/automattic-domain-services-client-event-domain-set.md)[\Privacy](../namespaces/automattic-domain-services-client-event-domain-set-privacy.md)\Success

## Summary:

Success event for a `Domain\Set\Privacy` command

## Description:

- This event is generated when a privacy setting update succeeds at the server.
- Contains a `privacy_setting` property with the privacy option that was set at the registry


---

### Methods

* public [get_command_client_txn_id()](#method_get_command_client_txn_id)
* public [get_command_server_txn_id()](#method_get_command_server_txn_id)
* public [get_command_status()](#method_get_command_status)
* public [get_command_status_description()](#method_get_command_status_description)
* public [get_domain()](#method_get_domain)
* public [get_privacy_setting()](#method_get_privacy_setting)

---

### Details

* File: [lib/event/domain/set/privacy/success.php](../../lib/event/domain/set/privacy/success.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md)
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Domain\Set\Privacy](../classes/Automattic-Domain-Services-Client-Command-Domain-Set-Privacy.md)

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

<a id="method_get_privacy_setting"></a>
### get_privacy_setting

```
public get_privacy_setting() : \Automattic\Domain_Services_Client\Entity\Whois_Privacy|null
```

##### Summary

Returns the `Entity\Whois_Privacy` setting that was set for this domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Whois_Privacy|null
```
