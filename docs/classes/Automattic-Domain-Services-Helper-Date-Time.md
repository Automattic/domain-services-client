# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Helper](../namespaces/automattic-domain-services-helper.md)\Date_Time

## Summary:

A helper class to help formatting DateTime


---

### Methods

* public [create()](#method_create)
* public [createImmutable()](#method_createImmutable)
* public [format()](#method_format)
* public [get_format()](#method_get_format)

---

### Details

* File: [lib/helper/date-time.php](../../lib/helper/date-time.php)

---

## Methods

<a id="method_create"></a>
### create

```
static public create(string  datetime) : \DateTime|false
```

##### Summary

Creates a DateTime instance from string

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$datetime** | string |  |

##### Returns:

```
\DateTime|false
```

---

<a id="method_createImmutable"></a>
### createImmutable

```
static public createImmutable(string  datetime) : \DateTimeImmutable|false
```

##### Summary

Creates a DateTimeImmutable instance from a string

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$datetime** | string |  |

##### Returns:

```
\DateTimeImmutable|false
```

---

<a id="method_format"></a>
### format

```
static public format(\DateTimeInterface  datetime) : string
```

##### Summary

Formats either a DateTime or a DateTimeImmutable object into a string

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$datetime** | \DateTimeInterface |  |

##### Returns:

```
string
```

---

<a id="method_get_format"></a>
### get_format

```
static public get_format() : string
```

##### Summary

Returns the DateTime format used by the client

##### Returns:

```
string
```
