# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Event](../namespaces/automattic-domain-services-command-event.md)\Details

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
* See Also:
  * [\Automattic\Domain_Services\Response\Event\Details](../classes/Automattic-Domain-Services-Response-Event-Details.md)
  * [\Automattic\Domain_Services\Response\Event\Enumerate](../classes/Automattic-Domain-Services-Response-Event-Enumerate.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(int  event_id) : mixed
```

##### Summary

Constructs an `Event\Details` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$event_id** | int |  |

##### Returns:

```
mixed
```
