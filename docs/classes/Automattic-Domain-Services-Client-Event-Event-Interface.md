# Interface: Event_Interface
## Summary:

An interface used by all event classes.


---

### Constants
* public [KEY_ID](#constant_KEY_ID)
* public [KEY_OBJECT_ID](#constant_KEY_OBJECT_ID)
* public [KEY_OBJECT_TYPE](#constant_KEY_OBJECT_TYPE)
* public [KEY_EVENT_DATE](#constant_KEY_EVENT_DATE)
* public [KEY_ACKNOWLEDGED_DATE](#constant_KEY_ACKNOWLEDGED_DATE)
* public [KEY_EVENT_CLASS](#constant_KEY_EVENT_CLASS)
* public [KEY_EVENT_SUBCLASS](#constant_KEY_EVENT_SUBCLASS)
* public [KEY_EVENT_ERRORS](#constant_KEY_EVENT_ERRORS)
* public [KEY_COMMAND_STATUS](#constant_KEY_COMMAND_STATUS)
* public [KEY_COMMAND_STATUS_DESCRIPTION](#constant_KEY_COMMAND_STATUS_DESCRIPTION)
* public [KEY_COMMAND_CLIENT_TNX_ID](#constant_KEY_COMMAND_CLIENT_TNX_ID)
* public [KEY_COMMAND_SERVER_TNX_ID](#constant_KEY_COMMAND_SERVER_TNX_ID)

---

### Methods

* public [get_acknowledged_date()](#method_get_acknowledged_date)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_event_class()](#method_get_event_class)
* public [get_event_date()](#method_get_event_date)
* public [get_event_subclass()](#method_get_event_subclass)
* public [get_id()](#method_get_id)
* public [get_object_id()](#method_get_object_id)
* public [get_object_type()](#method_get_object_type)

---

### Details

* File: [lib/event/event-interface.php](../../lib/event/event-interface.php)

---

## Constants
<a id="constant_KEY_ID"></a>
###### KEY_ID
```
KEY_ID = 'id'
```


<a id="constant_KEY_OBJECT_ID"></a>
###### KEY_OBJECT_ID
```
KEY_OBJECT_ID = 'object_id'
```


<a id="constant_KEY_OBJECT_TYPE"></a>
###### KEY_OBJECT_TYPE
```
KEY_OBJECT_TYPE = 'object_type'
```


<a id="constant_KEY_EVENT_DATE"></a>
###### KEY_EVENT_DATE
```
KEY_EVENT_DATE = 'event_date'
```


<a id="constant_KEY_ACKNOWLEDGED_DATE"></a>
###### KEY_ACKNOWLEDGED_DATE
```
KEY_ACKNOWLEDGED_DATE = 'acknowledged_date'
```


<a id="constant_KEY_EVENT_CLASS"></a>
###### KEY_EVENT_CLASS
```
KEY_EVENT_CLASS = 'event_class'
```


<a id="constant_KEY_EVENT_SUBCLASS"></a>
###### KEY_EVENT_SUBCLASS
```
KEY_EVENT_SUBCLASS = 'event_subclass'
```


<a id="constant_KEY_EVENT_ERRORS"></a>
###### KEY_EVENT_ERRORS
```
KEY_EVENT_ERRORS = 'event_data.errors'
```


<a id="constant_KEY_COMMAND_STATUS"></a>
###### KEY_COMMAND_STATUS
```
KEY_COMMAND_STATUS = 'event_data.status'
```


<a id="constant_KEY_COMMAND_STATUS_DESCRIPTION"></a>
###### KEY_COMMAND_STATUS_DESCRIPTION
```
KEY_COMMAND_STATUS_DESCRIPTION = 'event_data.status_description'
```


<a id="constant_KEY_COMMAND_CLIENT_TNX_ID"></a>
###### KEY_COMMAND_CLIENT_TNX_ID
```
KEY_COMMAND_CLIENT_TNX_ID = 'event_data.client_tnx_id'
```


<a id="constant_KEY_COMMAND_SERVER_TNX_ID"></a>
###### KEY_COMMAND_SERVER_TNX_ID
```
KEY_COMMAND_SERVER_TNX_ID = 'event_data.server_tnx_id'
```



---

## Methods

<a id="method_get_acknowledged_date"></a>
### get_acknowledged_date

```
public get_acknowledged_date() : \DateTimeInterface|null
```

##### Summary

Gets the date this event was acknowledged.

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_data_by_key"></a>
### get_data_by_key

```
public get_data_by_key(string  key) : mixed
```

##### Summary

Gets the value of the event data specified by the given key.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |

##### Returns:

```
mixed
```

---

<a id="method_get_event_class"></a>
### get_event_class

```
public get_event_class() : string
```

##### Summary

Gets the event class

##### Returns:

```
string
```

---

<a id="method_get_event_date"></a>
### get_event_date

```
public get_event_date() : \DateTimeInterface
```

##### Summary

Gets the date this event was generated.

##### Returns:

```
\DateTimeInterface
```

---

<a id="method_get_event_subclass"></a>
### get_event_subclass

```
public get_event_subclass() : string
```

##### Summary

Gets the event subclass

##### Returns:

```
string
```

---

<a id="method_get_id"></a>
### get_id

```
public get_id() : int
```

##### Summary

Gets the event ID

##### Returns:

```
int
```

---

<a id="method_get_object_id"></a>
### get_object_id

```
public get_object_id() : string
```

##### Summary

Gets the ID of the object that this event references.

##### Description

- The contact ID for a contact object type
- The domain name for a domain object type

##### Returns:

```
string
```

---

<a id="method_get_object_type"></a>
### get_object_type

```
public get_object_type() : string
```

##### Summary

Gets the type of object that this event references (ex. &#039;domain&#039; or &#039;contact&#039;)

##### Returns:

```
string
```
