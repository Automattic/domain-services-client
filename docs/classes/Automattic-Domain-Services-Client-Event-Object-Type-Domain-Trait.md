# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)\Object_Type_Domain_Trait

## Summary:

Trait for objects that are associated with a domain.

## Description:

This trait relies on the `get_object_id()` method to be defined in the class that uses it.


---

### Methods

* public [get_domain()](#method_get_domain)

---

### Details

* File: [lib/event/object-type-domain-trait.php](../../lib/event/object-type-domain-trait.php)

---

## Methods

<a id="method_get_domain"></a>
### get_domain

```
final public get_domain() : \Automattic\Domain_Services_Client\Entity\Domain_Name
```

##### Summary

Returns the domain name object.

##### Returns:

```
\Automattic\Domain_Services_Client\Entity\Domain_Name
```
