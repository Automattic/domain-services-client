# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)[\Set](../namespaces/automattic-domain-services-command-domain-set.md)\Nameservers

## Summary:

Sets name servers for the specified domain

## Description:

- Runs asynchronously on the server
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


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/set/nameservers.php](../../lib/command/domain/set/nameservers.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Set\Nameservers](../classes/Automattic-Domain-Services-Response-Domain-Set-Nameservers.md)
  * [\Automattic\Domain_Services\Event\Domain\Set\Nameservers\Success](../classes/Automattic-Domain-Services-Event-Domain-Set-Nameservers-Success.md)
  * [\Automattic\Domain_Services\Event\Domain\Set\Nameservers\Fail](../classes/Automattic-Domain-Services-Event-Domain-Set-Nameservers-Fail.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain, \Automattic\Domain_Services\Entity\Nameservers  nameservers) : mixed
```

##### Summary

Constructs a `Domain\Set\Nameservers` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |
| **$nameservers** | \Automattic\Domain_Services\Entity\Nameservers |  |

##### Returns:

```
mixed
```
