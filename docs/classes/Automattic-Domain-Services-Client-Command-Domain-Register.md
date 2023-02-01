# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)\Register

## Summary:

Register a new a domain.

## Description:

- This command requests a new domain registration
- It runs asynchronously on the server
- Reseller will receive a `Domain\Register\Success` or `Domain\Register\Fail` event depending on the result of the
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


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/register.php](../../lib/command/domain/register.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Event\Domain\Register\Fail](../classes/Automattic-Domain-Services-Client-Event-Domain-Register-Fail.md)
  * [\Automattic\Domain_Services_Client\Event\Domain\Register\Success](../classes/Automattic-Domain-Services-Client-Event-Domain-Register-Success.md)
  * [\Automattic\Domain_Services_Client\Response\Domain\Register](../classes/Automattic-Domain-Services-Client-Response-Domain-Register.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, \Automattic\Domain_Services_Client\Entity\Domain_Contacts  contacts, int  period = 1, \Automattic\Domain_Services_Client\Entity\Nameservers|null  nameservers = null, \Automattic\Domain_Services_Client\Entity\Dns_Records|null  dns_records = null, string  privacy_setting = &#039;a8c_privacy_service&#039;, null|int  price = null) : mixed
```

##### Summary

Constructs a `Domain\Register` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$contacts** | \Automattic\Domain_Services_Client\Entity\Domain_Contacts |  |
| **$period** | int | 1 |
| **$nameservers** | \Automattic\Domain_Services_Client\Entity\Nameservers|null | null |
| **$dns_records** | \Automattic\Domain_Services_Client\Entity\Dns_Records|null | null |
| **$privacy_setting** | string | &#039;a8c_privacy_service&#039; |
| **$price** | null|int | null |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```
