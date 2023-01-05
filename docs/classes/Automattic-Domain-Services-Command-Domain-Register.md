# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Register

## Summary:

Register a new a domain.

## Description:

- This command requests a new domain registration
- It runs asynchronously on the server
- Reseller will receive a Domain\Register\Success or Domain\Register\Fail event depending on the result of the
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
* public [get_client_txn_id()](#method_get_client_txn_id)
* public [get_contacts()](#method_get_contacts)
* public [get_contacts_array_key()](#method_get_contacts_array_key)
* public [get_dns_records()](#method_get_dns_records)
* public [get_domain()](#method_get_domain)
* public [get_domain_name_array_key()](#method_get_domain_name_array_key)
* public [get_name()](#method_get_name)
* public [get_nameservers()](#method_get_nameservers)
* public [get_period()](#method_get_period)
* public [get_price()](#method_get_price)
* public [get_privacy_setting()](#method_get_privacy_setting)
* public [get_resource_path()](#method_get_resource_path)
* public [jsonSerialize()](#method_jsonSerialize)
* public [set_client_txn_id()](#method_set_client_txn_id)
* public [to_array()](#method_to_array)

---

### Details

* File: [lib/command/domain/register.php](../../lib/command/domain/register.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services\Command\Array_Key_Contacts_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Contacts-Trait.md)
  * [\Automattic\Domain_Services\Command\Array_Key_Domain_Trait](../classes/Automattic-Domain-Services-Command-Array-Key-Domain-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Command-Command-Serialize-Trait.md)
  * [\Automattic\Domain_Services\Command\Command_Trait](../classes/Automattic-Domain-Services-Command-Command-Trait.md)
* See Also:
  * [\Automattic\Domain_Services\Event\Domain\Register\Fail](../classes/Automattic-Domain-Services-Event-Domain-Register-Fail.md)
  * [\Automattic\Domain_Services\Event\Domain\Register\Success](../classes/Automattic-Domain-Services-Event-Domain-Register-Success.md)
  * [\Automattic\Domain_Services\Response\Domain\Register](../classes/Automattic-Domain-Services-Response-Domain-Register.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain, \Automattic\Domain_Services\Entity\Domain_Contacts  contacts, int  period = 1, \Automattic\Domain_Services\Entity\Nameservers|null  nameservers = null, \Automattic\Domain_Services\Entity\Dns_Records|null  dns_records = null, string  privacy_setting = &#039;a8c_privacy_service&#039;, null|int  price = null) : mixed
```

##### Summary

Constructs the Register command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |
| **$contacts** | \Automattic\Domain_Services\Entity\Domain_Contacts |  |
| **$period** | int | 1 |
| **$nameservers** | \Automattic\Domain_Services\Entity\Nameservers|null | null |
| **$dns_records** | \Automattic\Domain_Services\Entity\Dns_Records|null | null |
| **$privacy_setting** | string | &#039;a8c_privacy_service&#039; |
| **$price** | null|int | null |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```

---

<a id="method_get_client_txn_id"></a>
### get_client_txn_id

```
final public get_client_txn_id() : string
```

##### Summary

Gets the client transaction ID set for this command.

##### Returns:

```
string
```

---

<a id="method_get_contacts"></a>
### get_contacts

```
public get_contacts() : \Automattic\Domain_Services\Entity\Domain_Contacts
```

##### Summary

Gets the contacts to be created for the domain

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Contacts
```

---

<a id="method_get_contacts_array_key"></a>
### get_contacts_array_key

```
final static public get_contacts_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_dns_records"></a>
### get_dns_records

```
public get_dns_records() : ?\Automattic\Domain_Services\Entity\Dns_Records
```

##### Summary

Gets the dns records to be set for the domain

##### Returns:

```
?\Automattic\Domain_Services\Entity\Dns_Records
```

---

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services\Entity\Domain_Name
```

##### Summary

Gets the domain name to be registered

##### Returns:

```
\Automattic\Domain_Services\Entity\Domain_Name
```

---

<a id="method_get_domain_name_array_key"></a>
### get_domain_name_array_key

```
final static public get_domain_name_array_key() : string
```

##### Returns:

```
string
```

---

<a id="method_get_name"></a>
### get_name

```
static public get_name() : string
```

##### Summary

Returns the command name that can be used to build command data

##### Returns:

```
string
```

---

<a id="method_get_nameservers"></a>
### get_nameservers

```
public get_nameservers() : \Automattic\Domain_Services\Entity\Nameservers
```

##### Summary

Gets the contacts to be set for the domain

##### Returns:

```
\Automattic\Domain_Services\Entity\Nameservers
```

---

<a id="method_get_period"></a>
### get_period

```
public get_period() : int
```

##### Summary

Get the amount of years for which the domain is to be renewed.

##### Returns:

```
int
```

---

<a id="method_get_price"></a>
### get_price

```
public get_price() : int|null
```

##### Summary

Gets the price for this domain.

##### Returns:

```
int|null
```

---

<a id="method_get_privacy_setting"></a>
### get_privacy_setting

```
public get_privacy_setting() : string
```

##### Summary

Gets the Whois privacy setting to be used for this domain.

##### Returns:

```
string
```

---

<a id="method_get_resource_path"></a>
### get_resource_path

```
final public get_resource_path() : string
```

##### Summary

Gets the path part for this command on the API endpoint.

##### Returns:

```
string
```

---

<a id="method_jsonSerialize"></a>
### jsonSerialize

```
final public jsonSerialize() : array
```

##### Summary

Implements the JsonSerializable interface

##### Returns:

```
array
```

---

<a id="method_set_client_txn_id"></a>
### set_client_txn_id

```
final public set_client_txn_id(string  client_txn_id) : void
```

##### Summary

Sets the client transaction ID for this command. This optional value may be set by the reseller. It will be
reflected in the corresponding Response class and may be useful for logging and debugging.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$client_txn_id** | string |  |

##### Returns:

```
void
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### Summary

Returns the command parameters as an array for use when in the jsonSerialize() method

##### Returns:

```
array
```
