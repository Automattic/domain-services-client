Automattic\Domain_Services\Command\Domain\Set\Contacts
===============Updates domain contacts- This command updates any or all of a domain's contacts.
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
* Class name:Contacts
* Namespace:\Automattic\Domain_Services\Command\Domain\Set* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Set\Contacts::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, \Automattic\Domain_Services\Entity\Domain_Contacts contacts)Constructs a Domain\Set\Contacts command



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***contacts **[Automattic\Domain_Services\Entity\Domain_Contacts](Automattic-Domain_Services-Entity-Domain_Contacts.md)**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Set\Contacts::get_domain()



* Visibility: **public**
###get_contacts\Automattic\Domain_Services\Entity\Domain_Contacts Automattic\Domain_Services\Command\Domain\Set\Contacts::get_contacts()



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_contacts_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Contacts::get_contacts_array_key()



* Visibility: **public*** This method is **static**.
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Contacts::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Set\Contacts::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Set\Contacts::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**