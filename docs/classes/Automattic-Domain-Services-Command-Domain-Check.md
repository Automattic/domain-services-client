# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Command](../namespaces/automattic-domain-services-command.md)[\Domain](../namespaces/automattic-domain-services-command-domain.md)\Check

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
* See Also:
  * [\Automattic\Domain_Services\Response\Domain\Check](../classes/Automattic-Domain-Services-Response-Domain-Check.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Domain_Names  domains) : mixed
```

##### Summary

Constructs a `Domain\Check` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domains** | \Automattic\Domain_Services\Entity\Domain_Names |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```
