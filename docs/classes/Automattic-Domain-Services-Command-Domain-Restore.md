# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Restore

## Summary:

Restores (redeems) a domain that is currently in the redemption period.

## Description:

- This command requests a restore for the specified domain.
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


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/restore.php](../../lib/command/domain/restore.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Event\Domain\Restore\Fail](../classes/Automattic-Domain-Services-Event-Domain-Restore-Fail.md)
  * [\Automattic\Domain_Services_Client\Event\Domain\Restore\Success](../classes/Automattic-Domain-Services-Event-Domain-Restore-Success.md)
  * [\Automattic\Domain_Services_Client\Response\Domain\Restore](../classes/Automattic-Domain-Services-Response-Domain-Restore.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs the Restore command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |

##### Returns:

```
mixed
```
