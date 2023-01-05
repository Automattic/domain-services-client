# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Response](../namespaces/automattic-domain-services-response.md)[\Domain](../namespaces/automattic-domain-services-response-domain.md)\Info

## Summary:

Response of a `Domain\Info` command

## Description:

This is the response returned from a successful execution of the `Domain\Info` command. It includes all the current
attributes of the domain at the registry.


---

### Methods

* public [__construct()](#method___construct)
* public [get_auth_code()](#method_get_auth_code)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_contacts()](#method_get_contacts)
* public [get_created_date()](#method_get_created_date)
* public [get_data_by_key()](#method_get_data_by_key)
* public [get_dnssec()](#method_get_dnssec)
* public [get_dnssec_ds_dsata()](#method_get_dnssec_ds_dsata)
* public [get_domain_status()](#method_get_domain_status)
* public [get_expiration_date()](#method_get_expiration_date)
* public [get_name_servers()](#method_get_name_servers)
* public [get_paid_until()](#method_get_paid_until)
* public [get_privacy_setting()](#method_get_privacy_setting)
* public [get_registrar_transfer_date()](#method_get_registrar_transfer_date)
* public [get_renewal_mode()](#method_get_renewal_mode)
* public [get_rgp_status()](#method_get_rgp_status)
* public [get_runtime()](#method_get_runtime)
* public [get_server_txn_id()](#method_get_server_txn_id)
* public [get_status()](#method_get_status)
* public [get_status_description()](#method_get_status_description)
* public [get_timestamp()](#method_get_timestamp)
* public [get_transfer_lock()](#method_get_transfer_lock)
* public [get_transfer_mode()](#method_get_transfer_mode)
* public [get_updated_date()](#method_get_updated_date)
* public [is_success()](#method_is_success)

---

### Details

* File: [lib/response/domain/info.php](../../lib/response/domain/info.php)
* Implements:
  * [\Automattic\Domain_Services\Response\Response_Interface](../classes/Automattic-Domain-Services-Response-Response-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Response\Data_Trait](../classes/Automattic-Domain-Services-Response-Data-Trait.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
final public __construct(array  data = []) : mixed
```

##### Summary`Response` object constructor
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$data** | array | [] |

##### Returns:

```
mixed
```

---

<a id="method_get_auth_code"></a>
### get_auth_code

```
public get_auth_code() : string
```

##### SummaryGets the domain EPP auth code
##### Returns:

```
string
```

---

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
final public get_client_txn_id() : string
```

##### SummaryGets the client transaction ID that was sent with the request. Useful for logging and debugging.
##### Returns:

```
string
```

---

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : \Automattic\Domain_Services\Entity\Domain_Contacts
```

##### SummaryGets the contacts associated with this domain
##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Contacts
```

---

<a id="method_get_created_date"></a>
### get_created_date

```
public get_created_date() : string|null
```

##### SummaryGets the date the domain was registered to the reseller&#039;s account
##### Returns:

```
string|null
```

---

<a id="method_get_data_by_key"></a>
### get_data_by_key

```
final public get_data_by_key(string  key) : array|mixed|null
```

##### SummaryReturns the response value for the given key, if it exists.
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$key** | string |  |

##### Returns:

```
array|mixed|null
```

---

<a id="method_get_dnssec"></a>
### get_dnssec

```
public get_dnssec() : string|null
```

##### SummaryGets the DNSSec key data for the domain, if any exists
##### Returns:

```
string|null
```

---

<a id="method_get_dnssec_ds_dsata"></a>
### get_dnssec_ds_dsata

```
public get_dnssec_ds_dsata() : string|null
```

##### SummaryGets the DNSSec DS data for the domain, if any exists
##### Returns:

```
string|null
```

---

<a id="method_get_domain_status"></a>
### get_domain_status

```
public get_domain_status() : \Automattic\Domain_Services\Entity\Epp_Status_Codes
```

##### SummaryGets the current EPP status codes for the domain
##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Entity\Epp_Status_Codes
```

---

<a id="method_get_expiration_date"></a>
### get_expiration_date

```
public get_expiration_date() : string|null
```

##### SummaryGets the date the domain registration will expire
##### Returns:

```
string|null
```

---

<a id="method_get_name_servers"></a>
### get_name_servers

```
public get_name_servers() : \Automattic\Domain_Services\Entity\Nameservers|null
```

##### SummaryGets the name servers set at the registry for this domain
##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Entity\Nameservers|null
```

---

<a id="method_get_paid_until"></a>
### get_paid_until

```
public get_paid_until() : \DateTimeInterface|null
```

##### SummaryGets the date until which the domain has been paid for
##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_privacy_setting"></a>
### get_privacy_setting

```
public get_privacy_setting() : \Automattic\Domain_Services\Entity\Whois_Privacy|null
```

##### SummaryGets the whois privacy setting for the domain
##### Returns:

```
\Automattic\Domain_Services\Entity\Whois_Privacy|null
```

---

<a id="method_get_registrar_transfer_date"></a>
### get_registrar_transfer_date

```
public get_registrar_transfer_date() : \DateTimeInterface|null
```

##### SummaryGets the date which the domain was transferred to the reseller&#039;s account, if the domain was added via an inbound
transfer
##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_renewal_mode"></a>
### get_renewal_mode

```
public get_renewal_mode() : string|null
```

##### SummaryGets the renewal mode of this domain
##### Returns:

```
string|null
```

---

<a id="method_get_rgp_status"></a>
### get_rgp_status

```
public get_rgp_status() : string|null
```

##### SummaryGets the Renewal Grace Period (RGP) status for this domain. This is usually one of the following:
- `addPeriod`: The grace period after initial registration of the domain name. If the reseller deletes the domain
     during this period, the registry may provide a credit for the cost of the registration.
##### Description- `autoRenewPeriod`: The grace period after a domain name expires. The domain may be renewed at the regular cost
during this period.
##### Returns:

```
string|null
```

---

<a id="method_get_runtime"></a>
### get_runtime

```
final public get_runtime() : float
```

##### SummaryGets the runtime (in seconds) the processing of this command took on the back-end.
##### Returns:

```
float
```

---

<a id="method_get_server_txn_id"></a>
### get_server_txn_id

```
final public get_server_txn_id() : string
```

##### SummaryGets the server transaction ID that was generated by the Automattic Domain Services back-end for this request.
##### DescriptionUseful for logging and debugging.
##### Returns:

```
string
```

---

<a id="method_get_status"></a>
### get_status

```
final public get_status() : int
```

##### SummaryGets the response status code
##### See Also:

 * [](classes/Automattic-Domain-Services-Response-Code.md)

##### Returns:

```
int
```

---

<a id="method_get_status_description"></a>
### get_status_description

```
final public get_status_description() : string
```

##### SummaryGets the response status description
##### See Also:

 * [](\Automattic\Domain_Services\Response\Code::DESCRIPTION)

##### Returns:

```
string
```

---

<a id="method_get_timestamp"></a>
### get_timestamp

```
final public get_timestamp() : int
```

##### SummaryGets the timestamp this response was generated.
##### Returns:

```
int
```

---

<a id="method_get_transfer_lock"></a>
### get_transfer_lock

```
public get_transfer_lock() : bool|null
```

##### SummaryGets the transferlock status.
##### Description- `true`: The domain must be unlocked before it can be transferred.
- `false`: The domain does not need to be unlocked before it can be transferred.
##### Returns:

```
bool|null
```

---

<a id="method_get_transfer_mode"></a>
### get_transfer_mode

```
public get_transfer_mode() : string|null
```

##### SummaryGets the transfer mode. One of the following:
- Default: apply the registry policy (usually auto deny)
- `autoapprove`: Automatically approve outbound transfers after 5 days
- `autodeny`: Automatically deny outbound transfers after 5 days
##### Returns:

```
string|null
```

---

<a id="method_get_updated_date"></a>
### get_updated_date

```
public get_updated_date() : \DateTimeInterface|null
```

##### SummaryGets the date that the domain was last updated at the registry.
##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_is_success"></a>
### is_success

```
final public is_success() : bool
```

##### SummaryGets whether the request succeeded.
##### Returns:

```
bool
```