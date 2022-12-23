Automattic\Domain_Services\Command\Domain\Renew
===============Renews a domain- This command renews a domain for a specified number of years
- The required parameters are:
    - `domain_name` - the domain to renew
    - `period` - number of years to renew the domain
    - `current_expiration_year` - in which year the domain is currently going to expire (used to prevent unwanted
      multiple renewals)
- Optional parameter:
    - `fee_amount` - used when renewing premium domains because they have special pricing
- Runs asynchronously on the server
- Reseller will receive a `Domain\Renew\Success` or `Domain\Renew\Fail` event depending on the result of the command

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$current_expiration_year = 2022;
$period = 1;

$command = new Command\Domain\Renew( $domain_name, $current_expiration_year, $period );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // domain was renewed successfully
}
```
* Class name:Renew
* Namespace:\Automattic\Domain_Services\Command\Domain* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Renew::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, int current_expiration_year, int period, float|null fee_amount)Constructs a Domain\Renew command



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***current_expiration_year **int***period **int***fee_amount **float|null**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Renew::get_domain()Returns the domain name that will be renewed



* Visibility: **public**
###get_periodint Automattic\Domain_Services\Command\Domain\Renew::get_period()Returns the number of years the domain will be renewed for



* Visibility: **public**
###get_current_expiration_yearint Automattic\Domain_Services\Command\Domain\Renew::get_current_expiration_year()Returns the domain's current expiration year



* Visibility: **public**
###get_fee_amountfloat|null Automattic\Domain_Services\Command\Domain\Renew::get_fee_amount()Returns the renewal fee amount (used for premium domains)



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_current_expiration_year_array_keymixed Automattic\Domain_Services\Command\Domain\Renew::get_current_expiration_year_array_key()



* Visibility: **public*** This method is **static**.
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Renew::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###get_fee_amount_array_keymixed Automattic\Domain_Services\Command\Domain\Renew::get_fee_amount_array_key()



* Visibility: **public*** This method is **static**.
###get_period_array_keymixed Automattic\Domain_Services\Command\Domain\Renew::get_period_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Renew::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Renew::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**