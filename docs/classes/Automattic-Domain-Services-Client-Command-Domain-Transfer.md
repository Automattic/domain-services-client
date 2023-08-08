# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)\Transfer

## Summary:

Transfer in a domain.

## Description:

- This command transfer in a domain registered with a different registrar.
- The domain must be unlocked and have the correct auth code.
- The domain must not be within 60 days of the registration date or a previous transfer.
- The domain must not be within 60 days of a previous transfer.
- The domain must not be premium.
- The tld should be supported.
- The actual transfer is processed asynchronously on the server. The result of the actual transfer operation will be
  returned in an event.

Example usage:
```
$domain_name = new Entity\Domain_Name( 'example.com' );
$auth_code = '1234567890';
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
$command = new Command\Domain\Transfer( $domain_name, $auth_code, $contacts, $nameservers, $dns_records );
$response = $api->post( $command );
if ( $response->is_success() ) {
       // The transfer request was successfully queued.
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_auth_code()](#method_get_auth_code)
* public [get_contacts()](#method_get_contacts)
* public [get_dns_records()](#method_get_dns_records)
* public [get_domain()](#method_get_domain)
* public [get_nameservers()](#method_get_nameservers)

---

### Details

* File: [lib/command/domain/transfer.php](../../lib/command/domain/transfer.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Event\Domain\Transfer\Fail](../classes/Automattic-Domain-Services-Client-Event-Domain-Transfer-Fail.md)
  * [\Automattic\Domain_Services_Client\Event\Domain\Transfer\Success](../classes/Automattic-Domain-Services-Client-Event-Domain-Transfer-Success.md)
  * [\Automattic\Domain_Services_Client\Response\Transfer](../\Automattic\Domain_Services_Client\Response\Transfer)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, string  auth_code, \Automattic\Domain_Services_Client\Entity\Domain_Contacts  contacts, \Automattic\Domain_Services_Client\Entity\Nameservers  nameservers = null, \Automattic\Domain_Services_Client\Entity\Dns_Records  dns_records = null) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$auth_code** | string |  |
| **$contacts** | \Automattic\Domain_Services_Client\Entity\Domain_Contacts |  |
| **$nameservers** | \Automattic\Domain_Services_Client\Entity\Nameservers | null |
| **$dns_records** | \Automattic\Domain_Services_Client\Entity\Dns_Records | null |

##### Returns:

```
mixed
```

---

<a id="method_get_auth_code"></a>
### get_auth_code

```
public get_auth_code() : string
```

##### Returns:

```
string
```

---

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : \Automattic\Domain_Services_Client\Entity\Domain_Contacts
```

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Contacts
```

---

<a id="method_get_dns_records"></a>
### get_dns_records

```
public get_dns_records() : ?\Automattic\Domain_Services_Client\Entity\Dns_Records
```

##### Returns:

```
?\Automattic\Domain_Services_Client\Entity\Dns_Records
```

---

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services_Client\Entity\Domain_Name
```

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
```

---

<a id="method_get_nameservers"></a>
### get_nameservers

```
public get_nameservers() : \Automattic\Domain_Services_Client\Entity\Nameservers
```

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Nameservers
```
