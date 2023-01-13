# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Contact](../namespaces/automattic-domain-services-command-contact.md)\Details

## Summary:

Retrieves the details of a contact by ID

## Description:

- The command returns the `Contact_Information` for a specific contact ID
- This command runs synchronously on the server

## Example:
```
$contact_id = new Entity\Contact_Id( 'SP1:5499554' );
$command = new Command\Contact\Details( $contact_id );

$response = $api->post( $command );
if ( $response->is_success() ) {
    $contact_information = $response->get_contact_information();
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_contact_id()](#method_get_contact_id)
* public [get_name()](#method_get_name)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/contact/details.php](../../lib/command/contact/details.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Contact\Details](../classes/Automattic-Domain-Services-Response-Contact-Details.md)
  * [\Automattic\Domain_Services\Command\Domain\Set\Contacts](../classes/Automattic-Domain-Services-Command-Domain-Set-Contacts.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Contact_Id  contact_id) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_id** | \Automattic\Domain_Services\Entity\Contact_Id |  |

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

<a id="method_get_contact_id"></a>
### get_contact_id

```
public get_contact_id() : \Automattic\Domain_Services\Entity\Contact_Id
```

##### Summary

Gets the contact ID

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Id
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
