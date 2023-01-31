# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Info

## Summary:

Retrieves information about a domain that is registered with the reseller.

## Description:

- This command retrieves information about a domain that is registered on the reseller's account.
- If the domain is not registered on the reseller's account an error is returned.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/info.php](../../lib/command/domain/info.php)
* Implements:
  * [\Automattic\Domain_Services\Command\Command_Interface](../classes/Automattic-Domain-Services-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Info](../classes/Automattic-Domain-Services-Response-Domain-Info.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs a `Domain\Info` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services\Entity\Domain_Name |  |

##### Returns:

```
mixed
```
