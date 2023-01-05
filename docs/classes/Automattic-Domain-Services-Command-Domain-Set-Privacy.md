# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)[\Set](../namespaces/automattic-domain-services-command-domain-set.md)\Privacy

## Summary:

Sets the privacy option that determines what contact information is shown in WHOIS.

## Description:

- Runs asynchronously on the server
- Reseller will receive a Domain\Set\Privacy\Success or Domain\Set\Privacy\Fail event depending on the result of the
command

Example:
```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$privacy_setting = new Entity\Whois_Privacy( Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE );
$command = new Command\Domain\Set\Privacy( $domain, $privacy_setting );
$response = $api->post( $command );
if ( $response->is_success() ) {
  // the request to update the privacy setting was queued successfully
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_domain()](#method_get_domain)
* public [get_domain_name_array_key()](#method_get_domain_name_array_key)
* public [get_name()](#method_get_name)
* public [get_privacy_setting()](#method_get_privacy_setting)
* public [get_privacy_setting_array_key()](#method_get_privacy_setting_array_key)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/domain/set/privacy.php](../../lib/command/domain/set/privacy.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Array_Key_Domain_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Domain-Trait.md)
  * [\Automattic\Domain_Services\Command\Array_Key_Privacy_Setting_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Privacy-Setting-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Event\Domain\Set\Privacy\Fail](../classes/Automattic-Domain-Services-Event-Domain-Set-Privacy-Fail.md)
  * [\Automattic\Domain_Services\Event\Domain\Set\Privacy\Success](../classes/Automattic-Domain-Services-Event-Domain-Set-Privacy-Success.md)
  * [\Automattic\Domain_Services\Response\Domain\Set\Privacy](../classes/Automattic-Domain-Services-Response-Domain-Set-Privacy.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain, \Automattic\Domain_Services\Entity\Whois_Privacy  privacy_setting) : mixed
```

##### Summary

Construct the Domain\Set\Privacy

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |
| **$privacy_setting** | \Automattic\Domain_Services\Entity\Whois_Privacy |  |

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

##### Summary

Gets the client transaction ID set for this command.

##### Returns:

```
string
```

---

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services\Entity\Domain_Name
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Name
```

---

<a id="method_get_domain_name_array_key"></a>
### get_domain_name_array_key

```
final static public get_domain_name_array_key() : string
```

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

<a id="method_get_privacy_setting"></a>
### get_privacy_setting

```
public get_privacy_setting() : \Automattic\Domain_Services\Entity\Whois_Privacy
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Whois_Privacy
```

---

<a id="method_get_privacy_setting_array_key"></a>
### get_privacy_setting_array_key

```
final static public get_privacy_setting_array_key() : string
```

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

##### Summary

Gets the path part for this command on the API endpoint.

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

##### Summary

Implements the JsonSerializable interface

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

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### Summary

Returns the command parameters as an array for use when in the jsonSerialize() method

##### Returns:

```
array
```
