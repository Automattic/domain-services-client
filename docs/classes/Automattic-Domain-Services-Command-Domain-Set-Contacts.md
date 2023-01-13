# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)[\Set](../namespaces/automattic-domain-services-command-domain-set.md)\Contacts

## Summary:

Updates domain contacts

## Description:

- This command updates any or all of a domain's contacts.
- Contact types not included in the request would not be updated, but won't be deleted.
- For each contact type, either a contact ID or the full contact information can be provided.
- If contact information is provided, a new contact will be created and the contact ID will be returned.
- This command runs asynchronously on the server.
- Getting a success response means that the operation was queued successfully.
- A domain has four contact types: owner, admin, tech and billing

## Example:
```
$domain_name = new Entity\Domain_Name( 'example.com' );
$contact_id = new Entity\Contact_Id( 'SP1:5499554' );
$domain_contacts = new Entity\Domain_Contacts();

$domain_contacts->set_owner( new Entity\Domain_Contact( $contact_id ) );
$domain_contacts->set_billing( new Entity\Domain_Contact( $contact_id ) );

$command = new Command\Domain\Set\Contacts( $domain_name, $domain_contacts );

$response = $api->post( $command );
if ( $response->is_success() ) {
    // The update request was queued successfully
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_contacts()](#method_get_contacts)
* public [get_domain()](#method_get_domain)
* public [get_name()](#method_get_name)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/domain/set/contacts.php](../../lib/command/domain/set/contacts.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Set\Contacts](../classes/Automattic-Domain-Services-Response-Domain-Set-Contacts.md)
  * [\Automattic\Domain_Services\Entity\Contact_Id](../classes/Automattic-Domain-Services-Entity-Contact-Id.md)
  * [\Automattic\Domain_Services\Entity\Contact_Information](../classes/Automattic-Domain-Services-Entity-Contact-Information.md)
  * [\Automattic\Domain_Services\Entity\Domain_Contacts](../classes/Automattic-Domain-Services-Entity-Domain-Contacts.md)
  * [\Automattic\Domain_Services\Entity\Domain_Contact](../classes/Automattic-Domain-Services-Entity-Domain-Contact.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain, \Automattic\Domain_Services\Entity\Domain_Contacts  contacts) : mixed
```

##### Summary

Constructs a Domain\Set\Contacts command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |
| **$contacts** | \Automattic\Domain_Services\Entity\Domain_Contacts |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

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

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : \Automattic\Domain_Services\Entity\Domain_Contacts
```

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Contacts
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
