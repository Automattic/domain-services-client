# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)\Check

## Summary:

Checks the price and availability for a list of domain names

## Description:

This command requests an availability and price check for the list of supplied domain names.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/check.php](../../lib/command/domain/check.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Check](../classes/Automattic-Domain-Services-Client-Response-Domain-Check.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Names  domains) : mixed
```

##### Summary

Constructs a `Domain\Check` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domains** | \Automattic\Domain_Services_Client\Entity\Domain_Names |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```
