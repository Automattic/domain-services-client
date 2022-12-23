Automattic\Domain_Services\Command\Contact\Details
===============Retrieves the details of a contact by ID- The command returns the `Contact_Information` for a specific contact ID
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
* Class name:Details
* Namespace:\Automattic\Domain_Services\Command\Contact* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Contact\Details::__construct(\Automattic\Domain_Services\Entity\Contact_Id contact_id)



* Visibility: **public**#### Arguments*contact_id **[Automattic\Domain_Services\Entity\Contact_Id](Automattic-Domain_Services-Entity-Contact_Id.md)**
###get_contact_id\Automattic\Domain_Services\Entity\Contact_Id Automattic\Domain_Services\Command\Contact\Details::get_contact_id()Gets the contact ID



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_contact_id_array_keymixed Automattic\Domain_Services\Command\Contact\Details::get_contact_id_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Contact\Details::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Contact\Details::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**