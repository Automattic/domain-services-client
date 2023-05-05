# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)\Suggestions

## Summary:

Retrieves a list of domain name suggestions based on a query string


---

### Methods

* public [__construct()](#method___construct)
* public [get_tlds()](#method_get_tlds)
* public [is_exact_match()](#method_is_exact_match)

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
public __construct(string  query, int  quantity, array|null  tlds = null, bool  exact_match = false) : mixed
```

##### Summary

Constructs a `Domain\Suggestions` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$query** | string |  |
| **$quantity** | int |  |
| **$tlds** | array|null | null |
| **$exact_match** | bool | false |

##### Returns:

```
mixed
```

---

<a id="method_get_tlds"></a>
### get_tlds

```
public get_tlds() : array|null
```

##### Summary

Returns the list of TLDs that the retrieved suggestions should be limited to

##### Returns:

```
array|null
```

---

<a id="method_is_exact_match"></a>
### is_exact_match

```
public is_exact_match() : bool
```

##### Summary

Returns whether the retrieved suggestions should be an exact match of the query string

##### Returns:

```
bool
```
