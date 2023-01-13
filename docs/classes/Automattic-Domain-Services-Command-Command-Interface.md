# Interface: Command_Interface

---

### Constants
* public [COMMAND](#constant_COMMAND)
* public [PARAMS](#constant_PARAMS)
* public [CLIENT_TXN_ID](#constant_CLIENT_TXN_ID)
* public [KEY_CONTACT_DISCLOSURE](#constant_KEY_CONTACT_DISCLOSURE)
* public [KEY_CONTACT_ID](#constant_KEY_CONTACT_ID)
* public [KEY_CONTACT_INFORMATION](#constant_KEY_CONTACT_INFORMATION)
* public [KEY_CONTACTS](#constant_KEY_CONTACTS)
* public [KEY_CURRENT_EXPIRATION_YEAR](#constant_KEY_CURRENT_EXPIRATION_YEAR)
* public [KEY_DOMAIN](#constant_KEY_DOMAIN)
* public [KEY_DOMAINS](#constant_KEY_DOMAINS)
* public [KEY_EVENT_ID](#constant_KEY_EVENT_ID)
* public [KEY_FEE_AMOUNT](#constant_KEY_FEE_AMOUNT)
* public [KEY_LIMIT](#constant_KEY_LIMIT)
* public [KEY_NAMESERVERS](#constant_KEY_NAMESERVERS)
* public [KEY_PERIOD](#constant_KEY_PERIOD)
* public [KEY_PRIVACY_SETTINGS](#constant_KEY_PRIVACY_SETTINGS)
* public [KEY_RECORD_SETS](#constant_KEY_RECORD_SETS)
* public [KEY_RECORDS](#constant_KEY_RECORDS)
* public [KEY_TRANSFERLOCK](#constant_KEY_TRANSFERLOCK)

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


<a id="constant_KEY_CONTACT_DISCLOSURE"></a>
###### KEY_CONTACT_DISCLOSURE
Array keys to be used with all commands

```
KEY_CONTACT_DISCLOSURE = 'contact_disclosure'
```


<a id="constant_KEY_CONTACT_ID"></a>
###### KEY_CONTACT_ID
```
KEY_CONTACT_ID = 'contact_id'
```


<a id="constant_KEY_CONTACT_INFORMATION"></a>
###### KEY_CONTACT_INFORMATION
```
KEY_CONTACT_INFORMATION = 'contact_information'
```


<a id="constant_KEY_CONTACTS"></a>
###### KEY_CONTACTS
```
KEY_CONTACTS = 'contacts'
```


<a id="constant_KEY_CURRENT_EXPIRATION_YEAR"></a>
###### KEY_CURRENT_EXPIRATION_YEAR
```
KEY_CURRENT_EXPIRATION_YEAR = 'current_expiration_year'
```


<a id="constant_KEY_DOMAIN"></a>
###### KEY_DOMAIN
```
KEY_DOMAIN = 'domain'
```


<a id="constant_KEY_DOMAINS"></a>
###### KEY_DOMAINS
```
KEY_DOMAINS = 'domains'
```


<a id="constant_KEY_EVENT_ID"></a>
###### KEY_EVENT_ID
```
KEY_EVENT_ID = 'event_id'
```


<a id="constant_KEY_FEE_AMOUNT"></a>
###### KEY_FEE_AMOUNT
```
KEY_FEE_AMOUNT = 'fee_amount'
```


<a id="constant_KEY_LIMIT"></a>
###### KEY_LIMIT
```
KEY_LIMIT = 'limit'
```


<a id="constant_KEY_NAMESERVERS"></a>
###### KEY_NAMESERVERS
```
KEY_NAMESERVERS = 'nameservers'
```


<a id="constant_KEY_PERIOD"></a>
###### KEY_PERIOD
```
KEY_PERIOD = 'period'
```


<a id="constant_KEY_PRIVACY_SETTINGS"></a>
###### KEY_PRIVACY_SETTINGS
```
KEY_PRIVACY_SETTINGS = 'privacy_setting'
```


<a id="constant_KEY_RECORD_SETS"></a>
###### KEY_RECORD_SETS
```
KEY_RECORD_SETS = 'record_sets'
```


<a id="constant_KEY_RECORDS"></a>
###### KEY_RECORDS
```
KEY_RECORDS = 'records'
```


<a id="constant_KEY_TRANSFERLOCK"></a>
###### KEY_TRANSFERLOCK
```
KEY_TRANSFERLOCK = 'transferlock'
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
