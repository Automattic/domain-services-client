# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Contact](../namespaces/automattic-domain-services-client-command-contact.md)\Details

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

---

### Details

* File: [lib/command/contact/details.php](../../lib/command/contact/details.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Client-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Trait](../classes/Automattic-Domain-Services-Client-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Contact\Details](../classes/Automattic-Domain-Services-Client-Response-Contact-Details.md)
  * [\Automattic\Domain_Services_Client\Command\Domain\Set\Contacts](../classes/Automattic-Domain-Services-Client-Command-Domain-Set-Contacts.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Contact_Id  contact_id) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_id** | \Automattic\Domain_Services_Client\Entity\Contact_Id |  |

##### Returns:

```
mixed
```
