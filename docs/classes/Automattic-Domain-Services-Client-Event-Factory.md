# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)\Factory

## Summary:

Factory class used to build an event from the provided data.


---

### Methods

* public [build_event()](#method_build_event)

---

### Details

* File: [lib/event/factory.php](../../lib/event/factory.php)

---

## Methods

<a id="method_build_event"></a>
### build_event

```
public build_event(array  event_data) : \Automattic\Domain_Services_Client\Event\Event_Interface
```

##### Summary

Builds an event from the provided event data

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$event_data** | array |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Event\Invalid_Event_Name |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Event\Event_Interface
```
