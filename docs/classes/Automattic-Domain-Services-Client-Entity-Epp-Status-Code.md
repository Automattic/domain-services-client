# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Epp_Status_Code

## Summary:

Represents an EPP status code


---

### Constants
* public [CLIENT_DELETE_PROHIBITED](#constant_CLIENT_DELETE_PROHIBITED)
* public [CLIENT_HOLD](#constant_CLIENT_HOLD)
* public [CLIENT_RENEW_PROHIBITED](#constant_CLIENT_RENEW_PROHIBITED)
* public [CLIENT_TRANSFER_PROHIBITED](#constant_CLIENT_TRANSFER_PROHIBITED)
* public [CLIENT_UPDATE_PROHIBITED](#constant_CLIENT_UPDATE_PROHIBITED)
* public [ADD_PERIOD](#constant_ADD_PERIOD)
* public [AUTO_RENEW_PERIOD](#constant_AUTO_RENEW_PERIOD)
* public [INACTIVE](#constant_INACTIVE)
* public [OK](#constant_OK)
* public [PENDING_CREATE](#constant_PENDING_CREATE)
* public [PENDING_DELETE](#constant_PENDING_DELETE)
* public [PENDING_RENEW](#constant_PENDING_RENEW)
* public [PENDING_RESTORE](#constant_PENDING_RESTORE)
* public [PENDING_TRANSFER](#constant_PENDING_TRANSFER)
* public [PENDING_UPDATE](#constant_PENDING_UPDATE)
* public [REDEMPTION_PERIOD](#constant_REDEMPTION_PERIOD)
* public [RENEW_PERIOD](#constant_RENEW_PERIOD)
* public [SERVER_DELETE_PROHIBITED](#constant_SERVER_DELETE_PROHIBITED)
* public [SERVER_HOLD](#constant_SERVER_HOLD)
* public [SERVER_RENEW_PROHIBITED](#constant_SERVER_RENEW_PROHIBITED)
* public [SERVER_TRANSFER_PROHIBITED](#constant_SERVER_TRANSFER_PROHIBITED)
* public [SERVER_UPDATE_PROHIBITED](#constant_SERVER_UPDATE_PROHIBITED)
* public [TRANSFER_PERIOD](#constant_TRANSFER_PERIOD)
* public [ICANN_EPP_STATUSES](#constant_ICANN_EPP_STATUSES)

---

### Methods

* public [__construct()](#method___construct)
* public [is_icann_status()](#method_is_icann_status)
* public [is_updateable()](#method_is_updateable)

---

### Details

* File: [lib/entity/epp-status-code.php](../../lib/entity/epp-status-code.php)

---

## Constants
<a id="constant_CLIENT_DELETE_PROHIBITED"></a>
###### CLIENT_DELETE_PROHIBITED
```
CLIENT_DELETE_PROHIBITED = 'clientDeleteProhibited'
```


<a id="constant_CLIENT_HOLD"></a>
###### CLIENT_HOLD
```
CLIENT_HOLD = 'clientHold'
```


<a id="constant_CLIENT_RENEW_PROHIBITED"></a>
###### CLIENT_RENEW_PROHIBITED
```
CLIENT_RENEW_PROHIBITED = 'clientRenewProhibited'
```


<a id="constant_CLIENT_TRANSFER_PROHIBITED"></a>
###### CLIENT_TRANSFER_PROHIBITED
```
CLIENT_TRANSFER_PROHIBITED = 'clientTransferProhibited'
```


<a id="constant_CLIENT_UPDATE_PROHIBITED"></a>
###### CLIENT_UPDATE_PROHIBITED
```
CLIENT_UPDATE_PROHIBITED = 'clientUpdateProhibited'
```


<a id="constant_ADD_PERIOD"></a>
###### ADD_PERIOD
```
ADD_PERIOD = 'addPeriod'
```


<a id="constant_AUTO_RENEW_PERIOD"></a>
###### AUTO_RENEW_PERIOD
```
AUTO_RENEW_PERIOD = 'autoRenewPeriod'
```


<a id="constant_INACTIVE"></a>
###### INACTIVE
```
INACTIVE = 'inactive'
```


<a id="constant_OK"></a>
###### OK
```
OK = 'ok'
```


<a id="constant_PENDING_CREATE"></a>
###### PENDING_CREATE
```
PENDING_CREATE = 'pendingCreate'
```


<a id="constant_PENDING_DELETE"></a>
###### PENDING_DELETE
```
PENDING_DELETE = 'pendingDelete'
```


<a id="constant_PENDING_RENEW"></a>
###### PENDING_RENEW
```
PENDING_RENEW = 'pendingRenew'
```


<a id="constant_PENDING_RESTORE"></a>
###### PENDING_RESTORE
```
PENDING_RESTORE = 'pendingRestore'
```


<a id="constant_PENDING_TRANSFER"></a>
###### PENDING_TRANSFER
```
PENDING_TRANSFER = 'pendingTransfer'
```


<a id="constant_PENDING_UPDATE"></a>
###### PENDING_UPDATE
```
PENDING_UPDATE = 'pendingUpdate'
```


<a id="constant_REDEMPTION_PERIOD"></a>
###### REDEMPTION_PERIOD
```
REDEMPTION_PERIOD = 'redemptionPeriod'
```


<a id="constant_RENEW_PERIOD"></a>
###### RENEW_PERIOD
```
RENEW_PERIOD = 'renewPeriod'
```


<a id="constant_SERVER_DELETE_PROHIBITED"></a>
###### SERVER_DELETE_PROHIBITED
```
SERVER_DELETE_PROHIBITED = 'serverDeleteProhibited'
```


<a id="constant_SERVER_HOLD"></a>
###### SERVER_HOLD
```
SERVER_HOLD = 'serverHold'
```


<a id="constant_SERVER_RENEW_PROHIBITED"></a>
###### SERVER_RENEW_PROHIBITED
```
SERVER_RENEW_PROHIBITED = 'serverRenewProhibited'
```


<a id="constant_SERVER_TRANSFER_PROHIBITED"></a>
###### SERVER_TRANSFER_PROHIBITED
```
SERVER_TRANSFER_PROHIBITED = 'serverTransferProhibited'
```


<a id="constant_SERVER_UPDATE_PROHIBITED"></a>
###### SERVER_UPDATE_PROHIBITED
```
SERVER_UPDATE_PROHIBITED = 'serverUpdateProhibited'
```


<a id="constant_TRANSFER_PERIOD"></a>
###### TRANSFER_PERIOD
```
TRANSFER_PERIOD = 'transferPeriod'
```


<a id="constant_ICANN_EPP_STATUSES"></a>
###### ICANN_EPP_STATUSES
```
ICANN_EPP_STATUSES = [self::CLIENT_DELETE_PROHIBITED => self::READ_WRITE, self::CLIENT_HOLD => self::READ_WRITE, self::CLIENT_RENEW_PROHIBITED => self::READ_WRITE, self::CLIENT_TRANSFER_PROHIBITED => self::READ_WRITE, self::CLIENT_UPDATE_PROHIBITED => self::READ_WRITE, self::ADD_PERIOD => self::READ_ONLY, self::AUTO_RENEW_PERIOD => self::READ_ONLY, self::INACTIVE => self::READ_ONLY, self::OK => self::READ_ONLY, self::PENDING_CREATE => self::READ_ONLY, self::PENDING_DELETE => self::READ_ONLY, self::PENDING_RENEW => self::READ_ONLY, self::PENDING_RESTORE => self::READ_ONLY, self::PENDING_TRANSFER => self::READ_ONLY, self::PENDING_UPDATE => self::READ_ONLY, self::REDEMPTION_PERIOD => self::READ_ONLY, self::RENEW_PERIOD => self::READ_ONLY, self::SERVER_DELETE_PROHIBITED => self::READ_ONLY, self::SERVER_HOLD => self::READ_ONLY, self::SERVER_RENEW_PROHIBITED => self::READ_ONLY, self::SERVER_TRANSFER_PROHIBITED => self::READ_ONLY, self::SERVER_UPDATE_PROHIBITED => self::READ_ONLY, self::TRANSFER_PERIOD => self::READ_ONLY]
```



---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  status) : mixed
```

##### Summary

Constructs an `Epp_Status_Code` entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$status** | string |  |

##### Returns:

```
mixed
```

---

<a id="method_is_icann_status"></a>
### is_icann_status

```
public is_icann_status() : bool
```

##### Summary

Checks wither this a standard ICANN EPP status code

##### Returns:

```
bool
```

---

<a id="method_is_updateable"></a>
### is_updateable

```
public is_updateable() : bool
```

##### Summary

Checks whether the EPP status is able to be set by the registrar

##### Returns:

```
bool
```
