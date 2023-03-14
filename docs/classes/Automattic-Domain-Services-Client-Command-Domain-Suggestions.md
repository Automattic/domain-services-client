# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)\Suggestions

## Summary:

Retrieves a list of domain name suggestions based on a query string


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/suggestions.php](../../lib/command/domain/suggestions.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Suggestions](../classes/Automattic-Domain-Services-Client-Response-Domain-Suggestions.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(string  query, int  quantity) : mixed
```

##### Summary

Constructs a `Domain\Suggestions` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$query** | string |  |
| **$quantity** | int |  |

##### Returns:

```
mixed
```