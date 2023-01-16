# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Dns](../namespaces/automattic-domain-services-command-dns.md)\Get

## Summary:

Returns the DNS records of a domain

## Description:

- This command returns all the DNS records associated with a domain
- Runs synchronously on the server

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$command = new Command\Dns\Get( $domain_name );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // $dns_records is an Entity\Dns_Records instance
    $dns_records = $response->get_dns_records();
}
```


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/dns/get.php](../../lib/command/dns/get.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Dns\Get](../classes/Automattic-Domain-Services-Response-Dns-Get.md)
  * [\Automattic\Domain_Services\Command\Dns\Set](../classes/Automattic-Domain-Services-Command-Dns-Set.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs a Dns\Get command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |

##### Returns:

```
mixed
```
