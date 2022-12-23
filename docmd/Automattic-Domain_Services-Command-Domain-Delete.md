Automattic\Domain_Services\Command\Domain\Delete
===============Deletes a domain- This command deletes a domain from the reseller's account
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
* Class name:Delete
* Namespace:\Automattic\Domain_Services\Command\Domain* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Delete::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain)Constructs the Delete command



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Delete::get_domain()Returns the domain name that will be deleted



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Delete::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Delete::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Delete::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**