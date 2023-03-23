# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)[\Set](../namespaces/automattic-domain-services-client-command-domain-set.md)\Nameservers

## Summary:

Sets name servers for the specified domain

## Description:

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
    // The request has been successfully processed
}
```


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/set/nameservers.php](../../lib/command/domain/set/nameservers.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Set\Nameservers](../classes/Automattic-Domain-Services-Client-Response-Domain-Set-Nameservers.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, \Automattic\Domain_Services_Client\Entity\Nameservers  nameservers) : mixed
```

##### Summary

Constructs a `Domain\Set\Nameservers` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$nameservers** | \Automattic\Domain_Services_Client\Entity\Nameservers |  |

##### Returns:

```
mixed
```
