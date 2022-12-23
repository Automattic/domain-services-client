Automattic\Domain_Services\Command\Domain\Set\Nameservers
===============Sets name servers for the specified domain- Runs asynchronously on the server
- Reseller will receive a `Domain\Set\Nameservers\Success` or `Domain\Set\Nameservers\Fail` event depending on the
  result of the operation

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$nameservers_array = [
    new Entity\Domain_Name( 'ns1.wordpress.com' ),
    new Entity\Domain_Name( 'ns2.wordpress.com' ),
];
$nameservers = new Entity\Nameservers( $nameservers_array );
$command = new Command\Domain\Set\Nameservers( $domain_name, $nameservers );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // command was issued successfully, the client should wait for a `Domain\Set\Nameservers\Success` or
    `Domain\Set\Nameservers\Fail event`
}
```
* Class name:Nameservers
* Namespace:\Automattic\Domain_Services\Command\Domain\Set* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Set\Nameservers::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, \Automattic\Domain_Services\Entity\Nameservers nameservers)



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***nameservers **[Automattic\Domain_Services\Entity\Nameservers](Automattic-Domain_Services-Entity-Nameservers.md)**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Set\Nameservers::get_domain()



* Visibility: **public**
###get_nameservers\Automattic\Domain_Services\Entity\Nameservers Automattic\Domain_Services\Command\Domain\Set\Nameservers::get_nameservers()



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Nameservers::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###get_nameservers_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Nameservers::get_nameservers_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Set\Nameservers::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Set\Nameservers::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**