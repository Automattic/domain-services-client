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
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_event_id_array_key()](#method_get_event_id_array_key)
* public [get_event_limit_array_key()](#method_get_event_limit_array_key)
* public [get_limit()](#method_get_limit)
* public [get_name()](#method_get_name)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [set_limit()](#method_set_limit)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/event/enumerate.php](../../lib/command/event/enumerate.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Array_Key_Event_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Event-Trait.md)
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

##### SummaryClass constructor
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$limit** | null|int | 50 |

##### Returns:

```
mixed
```

---

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
final public get_client_txn_id() : string
```

##### SummaryGets the client transaction ID set for this command.
##### Returns:

```
string
```

---

<a id="method_get_event_id_array_key"></a>
### get_event_id_array_key

```
final static public get_event_id_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_event_limit_array_key"></a>
### get_event_limit_array_key

```
final static public get_event_limit_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_limit"></a>
### get_limit

```
public get_limit() : int
```

##### SummaryGets the maximum number of events to return in the response.
##### Returns:

```
int
```

---

<a id="method_get_name"></a>
### get_name

```
static public get_name() : string
```

##### SummaryReturns the command name that can be used to build command data
##### Returns:

```
string
```

---

<a id="method_get_resource_path"></a>
### get_resource_path

```
final public get_resource_path() : string
```

##### SummaryGets the path part for this command on the API endpoint.
##### Returns:

```
string
```

---

<a id="method_jsonSerialize"></a>
### jsonSerialize

```
final public jsonSerialize() : array
```

##### SummaryImplements the JsonSerializable interface
##### Returns:

```
array
```

---

<a id="method_set_client_txn_id"></a>
### set_client_txn_id

```
final public set_client_txn_id(string  client_txn_id) : void
```

##### SummarySets the client transaction ID for this command. This optional value may be set by the reseller. It will be
reflected in the corresponding Response class and may be useful for logging and debugging.
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$client_txn_id** | string |  |

##### Returns:

```
void
```

---

<a id="method_set_limit"></a>
### set_limit

```
public set_limit(int  limit) : \Automattic\Domain_Services\Command\Event\Enumerate
```

##### SummarySets the maximum number of events to return in the response.
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$limit** | int |  |

##### Returns:

```
\Automattic\Domain_Services\Command\Event\Enumerate
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### SummaryReturns the command parameters as an array for use when in the jsonSerialize() method
##### Returns:

```
array
```
