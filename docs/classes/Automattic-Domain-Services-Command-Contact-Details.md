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

---

### Details

* File: [lib/command/contact/details.php](../../lib/command/contact/details.php)
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

##### Summary

Constructs a `Contact\Details` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$contact_id** | \Automattic\Domain_Services\Entity\Contact_Id |  |

##### Returns:

```
mixed
```
