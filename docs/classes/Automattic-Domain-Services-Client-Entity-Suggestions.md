# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Entity](../namespaces/automattic-domain-services-client-entity.md)\Suggestions

## Summary:

List of Suggestion entities

## Description:

Used in the `Domain\Suggestions` response.


---

### Methods

* public [__construct()](#method___construct)
* public [add_suggestion()](#method_add_suggestion)
* public [get_suggestions()](#method_get_suggestions)

---

### Details

* File: [lib/entity/domain-suggestions.php](../../lib/entity/domain-suggestions.php)
* See Also:
  * [\Automattic\Domain_Services_Client\Entity\Suggestion](../classes/Automattic-Domain-Services-Client-Entity-Suggestion.md)
  * [\Automattic\Domain_Services_Client\Response\Domain\Suggestions](../classes/Automattic-Domain-Services-Client-Response-Domain-Suggestions.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Suggestion  ...suggestions) : mixed
```

##### Summary

Constructs a Suggestions entity

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$suggestions** | \Automattic\Domain_Services_Client\Entity\Suggestion |  |

##### Returns:

```
mixed
```

---

<a id="method_add_suggestion"></a>
### add_suggestion

```
public add_suggestion(\Automattic\Domain_Services_Client\Entity\Suggestion  suggestion) : $this
```

##### Summary

Adds a new Suggestion to the list of suggestions

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$suggestion** | \Automattic\Domain_Services_Client\Entity\Suggestion |  |

##### Returns:

```
$this
```

---

<a id="method_get_suggestions"></a>
### get_suggestions

```
public get_suggestions() : \Automattic\Domain_Services_Client\Entity\Suggestions[]
```

##### Summary

Returns the suggestions array

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Suggestions[]
```
