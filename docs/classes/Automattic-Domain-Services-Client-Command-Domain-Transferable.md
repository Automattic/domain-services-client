# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)\Transferable

## Summary:

Check if a domain can be transferred in.

## Description:

- This command perform some checks to determine if a domain can be transferred.
- The domain must be unlocked and have the correct auth code.
- The domain must not be within 60 days of the registration date or a previous transfer.
- The domain must not be within 60 days of a previous transfer.
- The domain must not be premium.
- The tld should be supported.

Example usage:
```
$domain_name = new Entity\Domain_Name( 'example.com' );
$auth_code = '1234567890';
$command = new Command\Domain\Transferable( $domain_name, $auth_code );
$response = $api->post( $command );
if ( $response->is_success() ) {
       $transferable = $response->get_data()->is_transferable();
}
```


---

### Methods

* public [__construct()](#method___construct)
* public [get_auth_code()](#method_get_auth_code)
* public [get_domain()](#method_get_domain)

---

### Details

* File: [lib/command/domain/transferable.php](../../lib/command/domain/transferable.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Transferable](../classes/Automattic-Domain-Services-Client-Response-Domain-Transferable.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, string  auth_code) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$auth_code** | string |  |

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

<a id="method_get_domain"></a>
### get_domain

```
public get_domain() : \Automattic\Domain_Services_Client\Entity\Domain_Name
```

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
```
