# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Renew

## Summary:

Renews a domain

## Description:

- This command renews a domain for a specified number of years
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


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/renew.php](../../lib/command/domain/renew.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Renew](../classes/Automattic-Domain-Services-Response-Domain-Renew.md)
  * [\Automattic\Domain_Services_Client\Event\Domain\Renew\Success](../classes/Automattic-Domain-Services-Event-Domain-Renew-Success.md)
  * [\Automattic\Domain_Services_Client\Event\Domain\Renew\Fail](../classes/Automattic-Domain-Services-Event-Domain-Renew-Fail.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, int  current_expiration_year, int  period = 1, float|null  fee_amount = null) : mixed
```

##### Summary

Constructs a Domain\Renew command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$current_expiration_year** | int |  |
| **$period** | int | 1 |
| **$fee_amount** | float|null | null |

##### Returns:

```
mixed
```
