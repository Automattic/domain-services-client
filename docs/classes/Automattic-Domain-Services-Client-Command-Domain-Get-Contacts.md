# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)[\Get](../namespaces/automattic-domain-services-client-command-domain-get.md)\Contacts

## Summary:

Retrieves contact information for a domain that is registered with the reseller.

## Description:

- This command retrieves all the contact information (owner, tech, billing and admin) for a domain
  that is registered on the reseller's account.
- If the domain is not registered on the reseller's account an error is returned.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/get/contacts.php](../../lib/command/domain/get/contacts.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Get\Contacts](../classes/Automattic-Domain-Services-Client-Response-Domain-Get-Contacts.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs a `Domain\Get\Contacts` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |

##### Returns:

```
mixed
```
