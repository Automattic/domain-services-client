Automattic\Domain_Services\Command\Domain\Register
===============Register a new a domain.- This command requests a new domain registration
- It runs asynchronously on the server
- Reseller will receive a Domain\Register\Success or Domain\Register\Fail event depending on the result of the
  command

Example usage:
```
$domain_name = new Entity\Domain_Name( 'example.com' );
$contact_info = [
  'first_name' => 'John',
  'last_name' => 'Doe',
  'organization' => '',
  'address_1' => '60 29th Street #343',
  'address_2' => '',
  'postal_code' => '94110',
  'city' => 'San Francisco',
  'state' => 'CA',
  'country_code' => 'US',
  'email' => 'registrar@automattic.com',
  'phone' => '+1.8772733049',
  'fax' => null,
];
$contacts = Entity\Domain_Contacts::from_array(
  [
    'owner' => [ 'contact_information' => $contact_info ],
    'admin' => [ 'contact_information' => $contact_info ],
  ]
);
$name_servers = new Entity\Nameservers(
  new Entity\Domain_Name( 'ns1.example.com' ),
  new Entity\Domain_Name( 'ns2.example.com' ),
);
$dns_records = new Entity\Dns_Records(
  $domain,
  new Entity\Dns_Record_Sets(
    new Entity\Dns_Record_Set(
      '@',
      new Entity\Dns_Record_Type( Entity\Dns_Record_Type::A ),
      3600,
      [
        '1.2.3.4',
        '5.6.7.8',
      ]
    )
  )
);
$command = new Command\Domain\Register(
    $domain_name,
    $contacts,
    1,
    $name_servers,
    $dns_records,
    Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE,
    null
);
$response = $api->post( $command );
if ( $response->is_success() ) {
  // The register request was successfully queued.
}
```
* Class name:Register
* Namespace:\Automattic\Domain_Services\Command\Domain* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Register::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, \Automattic\Domain_Services\Entity\Domain_Contacts contacts, int period, \Automattic\Domain_Services\Entity\Nameservers|null nameservers, \Automattic\Domain_Services\Entity\Dns_Records|null dns_records, string privacy_setting, null|int price)Constructs the Register command



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***contacts **[Automattic\Domain_Services\Entity\Domain_Contacts](Automattic-Domain_Services-Entity-Domain_Contacts.md)***period **int***nameservers **[Automattic\Domain_Services\Entity\Nameservers](Automattic-Domain_Services-Entity-Nameservers.md)|null***dns_records **[Automattic\Domain_Services\Entity\Dns_Records](Automattic-Domain_Services-Entity-Dns_Records.md)|null***privacy_setting **string***price **null|int**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Register::get_domain()Gets the domain name to be registered



* Visibility: **public**
###get_contacts\Automattic\Domain_Services\Entity\Domain_Contacts Automattic\Domain_Services\Command\Domain\Register::get_contacts()Gets the contacts to be created for the domain



* Visibility: **public**
###get_periodint Automattic\Domain_Services\Command\Domain\Register::get_period()Get the amount of years for which the domain is to be renewed.



* Visibility: **public**
###get_nameservers\Automattic\Domain_Services\Entity\Nameservers Automattic\Domain_Services\Command\Domain\Register::get_nameservers()Gets the contacts to be set for the domain



* Visibility: **public**
###get_dns_records?\Automattic\Domain_Services\Entity\Dns_Records Automattic\Domain_Services\Command\Domain\Register::get_dns_records()Gets the dns records to be set for the domain



* Visibility: **public**
###get_privacy_settingstring Automattic\Domain_Services\Command\Domain\Register::get_privacy_setting()Gets the Whois privacy setting to be used for this domain.



* Visibility: **public**
###get_priceint|null Automattic\Domain_Services\Command\Domain\Register::get_price()Gets the price for this domain.



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_contacts_array_keymixed Automattic\Domain_Services\Command\Domain\Register::get_contacts_array_key()



* Visibility: **public*** This method is **static**.
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Register::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Register::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Register::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**