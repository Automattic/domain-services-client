Automattic\Domain_Services\Command\Domain\Set\Privacy
===============Sets the privacy option that determines what contact information is shown in the response of a whois query for this
domain.- Runs asynchronously on the server
- Reseller will receive a Domain\Set\Privacy\Success or Domain\Set\Privacy\Fail event depending on the result of the
command

Example:
```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$privacy_setting = new Entity\Whois_Privacy( Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE );
$command = new Command\Domain\Set\Privacy( $domain, $privacy_setting );
$response = $api->post( $command );
if ( $response->is_success() ) {
  // the request to update the privacy setting was queued successfully
}
```
* Class name:Privacy
* Namespace:\Automattic\Domain_Services\Command\Domain\Set* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Set\Privacy::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, \Automattic\Domain_Services\Entity\Whois_Privacy privacy_setting)Construct the Domain\Set\Privacy



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***privacy_setting **[Automattic\Domain_Services\Entity\Whois_Privacy](Automattic-Domain_Services-Entity-Whois_Privacy.md)**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Set\Privacy::get_domain()



* Visibility: **public**
###get_privacy_setting\Automattic\Domain_Services\Entity\Whois_Privacy Automattic\Domain_Services\Command\Domain\Set\Privacy::get_privacy_setting()



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Privacy::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###get_privacy_setting_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Privacy::get_privacy_setting_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Set\Privacy::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Set\Privacy::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**