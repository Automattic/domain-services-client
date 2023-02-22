# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)[\Domain](../namespaces/automattic-domain-services-client-event-domain.md)[\Restore](../namespaces/automattic-domain-services-client-event-domain-restore.md)\Fail

## Summary:

Failure event for a `Domain\Restore` command

## Description:

This event is sent when a restore operation fails. There may be more information about the cause of the failure in
the event data.


---

### Methods

* public [get_command_client_txn_id()](#method_get_command_client_txn_id)
* public [get_command_server_txn_id()](#method_get_command_server_txn_id)
* public [get_command_status()](#method_get_command_status)
* public [get_command_status_description()](#method_get_command_status_description)
* public [get_domain()](#method_get_domain)
* public [get_event_errors()](#method_get_event_errors)

---

### Details

* File: [lib/event/domain/restore/fail.php](../../lib/event/domain/restore/fail.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md)
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md)
  * [\Automattic\Domain_Services_Client\Event\Error_Trait](../classes/Automattic-Domain-Services-Client-Event-Error-Trait.md)
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

<a id="method_get_event_errors"></a>
### get_event_errors

```
final public get_event_errors() : array[]
```

##### Summary

Gets additional information about the reason for the error.

##### Description

The format will be an array of arrays:
[
    [
        &#039;description&#039; =&gt; &#039;A description of an error&#039;,
        &#039;extra&#039; =&gt; [
            &#039;extra_info_example_1&#039; =&gt; &#039;some additional information about this error&#039;,
    ],
    [
        &#039;description&#039; =&gt; &#039;A description of another error&#039;,
        &#039;extra&#039; =&gt; [
            &#039;extra_info_example_2&#039; =&gt; &#039;some additional information about this error&#039;,
            &#039;extra_info_example_3&#039; =&gt; &#039;even more additional information about this error&#039;,
        ],
    ],
]

##### Returns:

```
array[]
```
