# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Delete

## Summary:

Deletes a domain

## Description:

- This command deletes a domain from the reseller's account
- After you delete a domain, it may be impossible to register it again
- Runs asynchronously on the server
- Reseller will receive a `Domain\Delete\Success` or `Domain\Delete\Fail` event depending on the result of the
  command

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$command = new Command\Domain\Delete( $domain_name );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // command was issued correctly, the client should wait for a `Domain\Delete\Success` or
    // `Domain\Delete\Fail` event
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_domain()](#method_get_domain)
* public [get_domain_name_array_key()](#method_get_domain_name_array_key)
* public [get_name()](#method_get_name)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/domain/delete.php](../../lib/command/domain/delete.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Array_Key_Domain_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Domain-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Delete](../classes/Automattic-Domain-Services-Response-Domain-Delete.md)
  * [\Automattic\Domain_Services\Event\Domain\Delete\Success](../classes/Automattic-Domain-Services-Event-Domain-Delete-Success.md)
  * [\Automattic\Domain_Services\Event\Domain\Delete\Fail](../classes/Automattic-Domain-Services-Event-Domain-Delete-Fail.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain) : mixed
```

##### SummaryConstructs the Delete command
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

##### SummaryGets the client transaction ID set for this command.
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

##### SummaryReturns the domain name that will be deleted
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
