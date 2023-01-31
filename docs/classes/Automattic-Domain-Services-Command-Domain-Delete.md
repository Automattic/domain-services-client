# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Delete

## Summary:

Deletes a domain

## Description:

- This command deletes a domain from the reseller's account
- After you delete a domain, it may be impossible to register it again
- Runs asynchronously on the server
- Reseller will receive a `Domain\Delete\Success` or `Domain\Delete\Fail` event depending on the result of the
  command

Example usage:

```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$command = new Command\Domain\Delete( $domain_name );

$response = $api->post( $command );

if ( $response->is_success() ) {
    // command was issued correctly, the client should wait for a `Domain\Delete\Success` or
    // `Domain\Delete\Fail` event
}
```


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/delete.php](../../lib/command/domain/delete.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Delete](../classes/Automattic-Domain-Services-Response-Domain-Delete.md)
  * [\Automattic\Domain_Services\Event\Domain\Delete\Success](../classes/Automattic-Domain-Services-Event-Domain-Delete-Success.md)
  * [\Automattic\Domain_Services\Event\Domain\Delete\Fail](../classes/Automattic-Domain-Services-Event-Domain-Delete-Fail.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs a `Domain\Delete` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |

##### Returns:

```
mixed
```
