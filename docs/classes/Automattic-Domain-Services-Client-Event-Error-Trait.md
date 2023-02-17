# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Event](../namespaces/automattic-domain-services-client-event.md)\Error_Trait

## Summary:

Trait that specifies methods common to all error event classes.


---

### Methods

* public [get_event_errors()](#method_get_event_errors)

---

### Details

* File: [lib/event/error-trait.php](../../lib/event/error-trait.php)

---

## Methods

<a id="method_get_event_errors"></a>
### get_event_errors

```
final public get_event_errors() : array[]
```

##### Summary

Gets additional information about the reason for the error.

##### Description

The format will be an array of arrays:
[
    [
        &#039;description&#039; =&gt; &#039;A description of an error&#039;,
        &#039;extra&#039; =&gt; [
            &#039;extra_info_example_1&#039; =&gt; &#039;some additional information about this error&#039;,
    ],
    [
        &#039;description&#039; =&gt; &#039;A description of another error&#039;,
        &#039;extra&#039; =&gt; [
            &#039;extra_info_example_2&#039; =&gt; &#039;some additional information about this error&#039;,
            &#039;extra_info_example_3&#039; =&gt; &#039;even more additional information about this error&#039;,
        ],
    ],
]

##### Returns:

```
array[]
```
