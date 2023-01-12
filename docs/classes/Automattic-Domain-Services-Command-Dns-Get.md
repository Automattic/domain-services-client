# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Dns](../namespaces/automattic-domain-services-command-dns.md)\Get

## Summary:

Returns the DNS records of a domain

## Description:

- This command returns all the DNS records associated with a domain
- Runs synchronously on the server

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$command = new Command\Dns\Get( $domain_name );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // $dns_records is an Entity\Dns_Records instance
    $dns_records = $response->get_dns_records();
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_domain()](#method_get_domain)
* public [get_name()](#method_get_name)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/dns/get.php](../../lib/command/dns/get.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Dns\Get](../classes/Automattic-Domain-Services-Response-Dns-Get.md)
  * [\Automattic\Domain_Services\Command\Dns\Set](../classes/Automattic-Domain-Services-Command-Dns-Set.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs a Dns\Get command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |

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

##### Summary

Returns the domain name for which DNS records will be retrieved

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Name
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
