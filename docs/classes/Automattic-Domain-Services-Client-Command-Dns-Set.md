# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Dns](../namespaces/automattic-domain-services-client-command-dns.md)\Set

## Summary:

Updates DNS records of a domain

## Description:

- This command sets the DNS records associated with a domain
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
$command = new Command\Dns\Set( $domain_name, $dns_records );

$response = $api->post( $command );

if ( $response->is_success() ) {
    $domain_name = $response->get_domain_name();
    $records_added = $response->get_records_added();
    $records_deleted = $response->get_records_deleted();
}
```


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/dns/set.php](../../lib/command/dns/set.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Command\Dns\Get](../classes/Automattic-Domain-Services-Client-Command-Dns-Get.md)
  * [\Automattic\Domain_Services_Client\Response\Dns\Set](../classes/Automattic-Domain-Services-Client-Response-Dns-Set.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, \Automattic\Domain_Services_Client\Entity\Dns_Records  records) : mixed
```

##### Summary

Constructs a `Dns\Set` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$records** | \Automattic\Domain_Services_Client\Entity\Dns_Records |  |

##### Returns:

```
mixed
```
