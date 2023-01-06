# Interface: Command_Interface

---

### Constants
* public [COMMAND](#constant_COMMAND)
* public [PARAMS](#constant_PARAMS)
* public [CLIENT_TXN_ID](#constant_CLIENT_TXN_ID)

---

### Methods

* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_name()](#method_get_name)
* public [set_client_txn_id()](#method_set_client_txn_id)

---

### Details

* File: [lib/command/command-interface.php](../../lib/command/command-interface.php)

---

## Constants
<a id="constant_COMMAND"></a>
###### COMMAND
```
COMMAND = 'command'
```


<a id="constant_PARAMS"></a>
###### PARAMS
```
PARAMS = 'params'
```


<a id="constant_CLIENT_TXN_ID"></a>
###### CLIENT_TXN_ID
```
CLIENT_TXN_ID = 'client_txn_id'
```



---

## Methods

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
public get_client_txn_id() : string
```

##### Summary

Gets the client transaction ID

##### Returns:

```
string
```

---

<a id="method_get_name"></a>
### get_name

```
static public get_name() : string
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
public set_client_txn_id(string  client_txn_id) : void
```

##### Summary

Sets the client transaction ID

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$client_txn_id** | string |  |

##### Returns:

```
void
```
