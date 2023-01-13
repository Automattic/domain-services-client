# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)\Command_Trait


---

### Methods

* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_name()](#method_get_name)
* public [set_client_txn_id()](#method_set_client_txn_id)

---

### Details

* File: [lib/command/command-trait.php](../../lib/command/command-trait.php)

---

## Methods

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
final public get_client_txn_id() : string
```

##### Summary

Gets the client transaction ID set for this command.

##### Returns:

```
string
```

---

<a id="method_get_name"></a>
### get_name

```
final static public get_name() : string
```

##### Summary

Returns the command name that can be used to build command data

##### Returns:

```
string
```

---

<a id="method_set_client_txn_id"></a>
### set_client_txn_id

```
final public set_client_txn_id(string  client_txn_id) : void
```

##### Summary

Sets the client transaction ID for this command. This optional value may be set by the reseller. It will be
reflected in the corresponding Response class and may be useful for logging and debugging.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$client_txn_id** | string |  |

##### Returns:

```
void
```
