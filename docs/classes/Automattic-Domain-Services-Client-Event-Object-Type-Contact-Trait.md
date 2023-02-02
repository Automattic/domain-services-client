# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)\Object_Type_Contact_Trait

## Summary:

Trait for objects that are associated with a contact.

## Description:

This trait relies on the `get_object_id()` method to be defined in the class that uses it.


---

### Methods

* public [get_contact_id()](#method_get_contact_id)

---

### Details

* File: [lib/event/object-type-contact-trait.php](../../lib/event/object-type-contact-trait.php)

---

## Methods

<a id="method_get_contact_id"></a>
### get_contact_id

```
final public get_contact_id() : \Automattic\Domain_Services\Entity\Contact_Id
```

##### Summary

Returns the contact object.

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Entity\Contact_Id
```
