# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Event](../namespaces/automattic-domain-services-command-event.md)\Ack

## Summary:

Acknowledge an event

## Description:

- The command requests acknowledging a specific event by using the event ID.
- IDs can be fetched using the `Event\Enumerate` command.
- This command executes synchronously on the server.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/event/ack.php](../../lib/command/event/ack.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Event\Ack](../classes/Automattic-Domain-Services-Response-Event-Ack.md)
  * [\Automattic\Domain_Services\Response\Event\Enumerate](../classes/Automattic-Domain-Services-Response-Event-Enumerate.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(int  event_id) : mixed
```

##### Summary

Constructs an `Event\Ack` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$event_id** | int |  |

##### Returns:

```
mixed
```
