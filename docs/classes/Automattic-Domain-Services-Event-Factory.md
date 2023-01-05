# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Event](../namespaces/automattic-domain-services-event.md)\Factory


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
public build_event(array  event_data) : \Automattic\Domain_Services\Event\Event_Interface
```

##### SummaryBuilds an event from the provided event data
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$event_data** | array |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Event\Invalid_Event_Name |  |

##### Returns:

```
\Automattic\Domain_Services\Event\Event_Interface
```
