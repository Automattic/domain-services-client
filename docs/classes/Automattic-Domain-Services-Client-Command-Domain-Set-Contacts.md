# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)[\Set](../namespaces/automattic-domain-services-client-command-domain-set.md)\Contacts

## Summary:

Updates domain contacts

## Description:

- This command updates any or all of a domain's contacts.
- Contact types not included in the request would not be updated, but won't be deleted.
- For each contact type, either a contact ID or the full contact information can be provided.
- If contact information is provided, a new contact will be created and the contact ID will be returned.
- A domain has four contact types: owner, admin, tech and billing
- The `transferlock_opt_out` property determines whether the domain's 60 days transfer lock will be opted out when the command updates the contact information. By default, it's set to false: a 60 days transfer lock will be set, which prevents transfers until the end of the lock period - specific to the TLD of the domain. When true, no lock will be set.

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
    // The update request was successfully processed
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_transferlock_opt_out()](#method_get_transferlock_opt_out)

---

### Details

* File: [lib/command/domain/set/contacts.php](../../lib/command/domain/set/contacts.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Set\Contacts](../classes/Automattic-Domain-Services-Client-Response-Domain-Set-Contacts.md)
  * [\Automattic\Domain_Services_Client\Entity\Contact_Id](../classes/Automattic-Domain-Services-Client-Entity-Contact-Id.md)
  * [\Automattic\Domain_Services_Client\Entity\Contact_Information](../classes/Automattic-Domain-Services-Client-Entity-Contact-Information.md)
  * [\Automattic\Domain_Services_Client\Entity\Domain_Contacts](../classes/Automattic-Domain-Services-Client-Entity-Domain-Contacts.md)
  * [\Automattic\Domain_Services_Client\Entity\Domain_Contact](../classes/Automattic-Domain-Services-Client-Entity-Domain-Contact.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, \Automattic\Domain_Services_Client\Entity\Domain_Contacts  contacts, bool  transferlock_opt_out = false) : mixed
```

##### Summary

Constructs a `Domain\Set\Contacts` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$contacts** | \Automattic\Domain_Services_Client\Entity\Domain_Contacts |  |
| **$transferlock_opt_out** | bool | false |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_transferlock_opt_out"></a>
### get_transferlock_opt_out

```
public get_transferlock_opt_out() : bool
```

##### Summary

Gets whether this command should opt out of the transfer lock when updating the contact information.

##### Returns:

```
bool
```
