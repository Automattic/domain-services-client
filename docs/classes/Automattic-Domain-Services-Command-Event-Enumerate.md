# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Event](../namespaces/automattic-domain-services-command-event.md)\Enumerate

## Summary:

Requests a list of unacknowledged events

## Description:

This command is used to request a list of the unacknowledged events. On success, the response object will include an
array of events in ascending order by age (oldest to newest). The maximum number of events returned in the response,
can be set using the $limit property for this command. The limit defaults to 50 if none is set.
- This command executes synchronously on the server.
- The corresponding response object will include the list of events.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/event/enumerate.php](../../lib/command/event/enumerate.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Event\Enumerate](../classes/Automattic-Domain-Services-Response-Event-Enumerate.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(null|int  limit = 50) : mixed
```

##### Summary

Class constructor

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$limit** | null|int | 50 |

##### Returns:

```
mixed
```
