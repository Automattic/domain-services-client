# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)[\Set](../namespaces/automattic-domain-services-client-command-domain-set.md)\Privacy

## Summary:

Sets the privacy option that determines what contact information is shown in WHOIS.

## Description:

- Runs asynchronously on the server
- Reseller will receive a `Domain\Set\Privacy\Success` or `Domain\Set\Privacy\Fail` event depending on the result of the
command

Example:
```
$domain_name = new Entity\Domain_Name( 'example-domain.com' );
$privacy_setting = new Entity\Whois_Privacy( Entity\Whois_Privacy::ENABLE_PRIVACY_SERVICE );
$command = new Command\Domain\Set\Privacy( $domain, $privacy_setting );
$response = $api->post( $command );
if ( $response->is_success() ) {
  // the request to update the privacy setting was queued successfully
}
```


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/set/privacy.php](../../lib/command/domain/set/privacy.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Event\Domain\Set\Privacy\Fail](../classes/Automattic-Domain-Services-Client-Event-Domain-Set-Privacy-Fail.md)
  * [\Automattic\Domain_Services_Client\Event\Domain\Set\Privacy\Success](../classes/Automattic-Domain-Services-Client-Event-Domain-Set-Privacy-Success.md)
  * [\Automattic\Domain_Services_Client\Response\Domain\Set\Privacy](../classes/Automattic-Domain-Services-Client-Response-Domain-Set-Privacy.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, \Automattic\Domain_Services_Client\Entity\Whois_Privacy  privacy_setting) : mixed
```

##### Summary

Constructs a `Domain\Set\Privacy` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$privacy_setting** | \Automattic\Domain_Services_Client\Entity\Whois_Privacy |  |

##### Returns:

```
mixed
```
