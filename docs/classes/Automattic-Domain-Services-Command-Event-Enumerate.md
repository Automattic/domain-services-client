# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Event](../namespaces/automattic-domain-services-command-event.md)\Enumerate

## Summary:

Requests a list of unacknowledged events

## Description:

This command is used to request a list of the unacknowledged events. On success, the response object will include an
array of events in ascending order by age (oldest to newest). The maximum number of events returned in the response,
can be set using the `$limit` property for this command. The limit defaults to 50 if none is set.
- This command executes synchronously on the server.
- The corresponding response object will include the list of events.


---

### Methods

* public [__construct()](#method___construct)
* public [set_limit()](#method_set_limit)

---

### Details

* File: [lib/command/event/enumerate.php](../../lib/command/event/enumerate.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Event\Enumerate](../classes/Automattic-Domain-Services-Response-Event-Enumerate.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(int|null  limit = 50) : mixed
```

##### Summary

Constructs an `Event\Enumerate` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$limit** | int|null | 50 |

##### Returns:

```
mixed
```

---

<a id="method_set_limit"></a>
### set_limit

```
public set_limit(int  limit) : \Automattic\Domain_Services\Command\Event\Enumerate
```

##### Summary

Sets the maximum number of events to return in the response.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$limit** | int |  |

##### Returns:

```
\Automattic\Domain_Services\Command\Event\Enumerate
```
