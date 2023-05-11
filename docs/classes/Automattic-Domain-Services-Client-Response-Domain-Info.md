# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Response](../namespaces/automattic-domain-services-client-response.md)[\Domain](../namespaces/automattic-domain-services-client-response-domain.md)\Info

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
* public [get_transfer_mode()](#method_get_transfer_mode)
* public [get_transferlock()](#method_get_transferlock)
* public [get_updated_date()](#method_get_updated_date)
* public [is_success()](#method_is_success)

---

### Details

* File: [lib/response/domain/info.php](../../lib/response/domain/info.php)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Response\Data_Trait](../classes/Automattic-Domain-Services-Client-Response-Data-Trait.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
final public __construct(array  data = []) : mixed
```

##### Summary

`Response` object constructor

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

##### Summary

Gets the domain EPP auth code

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

##### Summary

Gets the client transaction ID that was sent with the request. Useful for logging and debugging.

##### Returns:

```
string
```

---

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : \Automattic\Domain_Services_Client\Entity\Domain_Contacts
```

##### Summary

Gets the contacts associated with this domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contacts
```

---

<a id="method_get_created_date"></a>
### get_created_date

```
public get_created_date() : \DateTimeInterface|null
```

##### Summary

Gets the date the domain was registered to the reseller&#039;s account

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_data_by_key"></a>
### get_data_by_key

```
final public get_data_by_key(string  key) : array|mixed|null
```

##### Summary

Returns the response value for the given key, if it exists.

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

##### Summary

Gets the DNSSec key data for the domain, if any exists

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

##### Summary

Gets the DNSSec DS data for the domain, if any exists

##### Returns:

```
string|null
```

---

<a id="method_get_domain_status"></a>
### get_domain_status

```
public get_domain_status() : \Automattic\Domain_Services_Client\Entity\Epp_Status_Codes
```

##### Summary

Gets the current EPP status codes for the domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Epp_Status_Codes
```

---

<a id="method_get_expiration_date"></a>
### get_expiration_date

```
public get_expiration_date() : \DateTimeInterface|null
```

##### Summary

Gets the date the domain registration will expire

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_name_servers"></a>
### get_name_servers

```
public get_name_servers() : \Automattic\Domain_Services_Client\Entity\Nameservers|null
```

##### Summary

Gets the name servers set at the registry for this domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Nameservers|null
```

---

<a id="method_get_paid_until"></a>
### get_paid_until

```
public get_paid_until() : \DateTimeInterface|null
```

##### Summary

Gets the date until which the domain has been paid for

##### Returns:

```
\DateTimeInterface|null
```

---

<a id="method_get_privacy_setting"></a>
### get_privacy_setting

```
public get_privacy_setting() : \Automattic\Domain_Services_Client\Entity\Whois_Privacy|null
```

##### Summary

Gets the whois privacy setting for the domain

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Whois_Privacy|null
```

---

<a id="method_get_registrar_transfer_date"></a>
### get_registrar_transfer_date

```
public get_registrar_transfer_date() : \DateTimeInterface|null
```

##### Summary

Gets the date which the domain was transferred to the reseller&#039;s account, if the domain was added via an inbound
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

##### Summary

Gets the renewal mode of this domain

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

##### Summary

Gets the Renewal Grace Period (RGP) status for this domain. This is usually one of the following:
- `addPeriod`: The grace period after initial registration of the domain name. If the reseller deletes the domain
     during this period, the registry may provide a credit for the cost of the registration.

##### Description

- `autoRenewPeriod`: The grace period after a domain name expires. The domain may be renewed at the regular cost
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

##### Summary

Gets the runtime (in seconds) the processing of this command took on the back-end.

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

##### Summary

Gets the server transaction ID that was generated by the Automattic Domain Services back-end for this request.

##### Description

Useful for logging and debugging.

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

##### Summary

Gets the response status code

##### See Also:

 * [\Automattic\Domain_Services_Client\Response\Code](../classes/Automattic-Domain-Services-Client-Response-Code.md)

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

##### Summary

Gets the response status description

##### See Also:

 * [\Automattic\Domain_Services_Client\Response\Code](../classes/Automattic-Domain-Services-Client-Response-Code.md)

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

##### Summary

Gets the timestamp this response was generated.

##### Returns:

```
int
```

---

<a id="method_get_transfer_mode"></a>
### get_transfer_mode

```
public get_transfer_mode() : string|null
```

##### Summary

Gets the transfer mode. One of the following:
- Default: apply the registry policy (usually auto deny)
- `autoapprove`: Automatically approve outbound transfers after 5 days
- `autodeny`: Automatically deny outbound transfers after 5 days

##### Returns:

```
string|null
```

---

<a id="method_get_transferlock"></a>
### get_transferlock

```
public get_transferlock() : bool|null
```

##### Summary

Gets the transferlock status.

##### Description

- `true`: The domain must be unlocked before it can be transferred.
- `false`: The domain does not need to be unlocked before it can be transferred.

##### Returns:

```
bool|null
```

---

<a id="method_get_updated_date"></a>
### get_updated_date

```
public get_updated_date() : \DateTimeInterface|null
```

##### Summary

Gets the date that the domain was last updated at the registry.

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

##### Summary

Gets whether the request succeeded.

##### Returns:

```
bool
```
