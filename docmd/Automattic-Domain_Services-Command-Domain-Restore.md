Automattic\Domain_Services\Command\Domain\Restore
===============Restores (redeems) a domain that is currently in the redemption period.- This command requests a restore for the specified domain.
- May only be used when a domain is in the redemption period. (Usually days 45-75 after expiration for most TLDs)
- Restoring a domain will usually also renew the domain for another year from the expiration date.
- Restoring a domain usually incurs an additional fee over the regular renewal cost.
- Note that not all TLDs support redemption.
- The actual restore is processed asynchronously on the server. The result of the actual restore operation will be
  returned in an event.

Example usage:
```
$domain_name = new Entity\Domain_Name( 'example.com' );
$command = new Command\Restore( $domain_name );
$response = $api->post( $command );
if ( $response->is_success() ) {
       // The restore request was successfully queued.
}
```
* Class name:Restore
* Namespace:\Automattic\Domain_Services\Command\Domain* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Restore::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain)Constructs the Restore command



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Restore::get_domain()Gets the domain name to be restored



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Restore::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Restore::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Restore::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**