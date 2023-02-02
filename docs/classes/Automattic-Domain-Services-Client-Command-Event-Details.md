# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Event](../namespaces/automattic-domain-services-client-command-event.md)\Details

## Summary:

Requests details of an event

## Description:

- This command requests the details of a specific event using its ID.
- IDs can be fetched using the `Event\Enumerate` command.
- This command executes synchronously on the server.
- The corresponding response object will include the details of an event.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/event/details.php](../../lib/command/event/details.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Command\Command_Trait](../classes/Automattic-Domain-Services-Client-Command-Command-Trait.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Client-Command-Command-Serialize-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Event\Details](../classes/Automattic-Domain-Services-Client-Response-Event-Details.md)
  * [\Automattic\Domain_Services_Client\Response\Event\Enumerate](../classes/Automattic-Domain-Services-Client-Response-Event-Enumerate.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(int  event_id) : mixed
```

##### Summary

Event_Details command constructor

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$event_id** | int |  |

##### Returns:

```
mixed
```
