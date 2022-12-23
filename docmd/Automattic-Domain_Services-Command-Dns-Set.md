Automattic\Domain_Services\Command\Dns\Set
===============Updates DNS records of a domain- This command sets the DNS records associated with a domain
- Any existing records are replaced by the new records
- Runs synchronously on the server

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$records_array = [
    [
        'name' => 'www',
        'type' => 'CNAME',
        'ttl' => 3600,
        'data' => [ 'example-domain.com.' ]
    ],
    [
        'name' => '@',
        'type' => 'A',
        'ttl' => 3600,
        'data' => [ '1.2.3.4' ]
    ],
];
$dns_record_sets = Entity\Dns_Record_Sets::from_array( $records_array );

$dns_records = new Entity\Dns_Records( $domain_name, $dns_record_sets );
$command = new Command\Dns\Set( $dns_records );

$response = $api->post( $command );

if ( $response->is_success() ) {
    $domain_name = $response->get_domain_name();
    $records_added = $response->get_records_added();
    $records_deleted = $response->get_records_deleted();
}
```
* Class name:Set
* Namespace:\Automattic\Domain_Services\Command\Dns* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Dns\Set::__construct(\Automattic\Domain_Services\Entity\Dns_Records records)Constructs a Dns\Set command



* Visibility: **public**#### Arguments*records **[Automattic\Domain_Services\Entity\Dns_Records](Automattic-Domain_Services-Entity-Dns_Records.md)**
###get_records\Automattic\Domain_Services\Entity\Dns_Records Automattic\Domain_Services\Command\Dns\Set::get_records()Returns the DNS records that will be set at the server



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_dns_records_array_keymixed Automattic\Domain_Services\Command\Dns\Set::get_dns_records_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Dns\Set::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Dns\Set::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**