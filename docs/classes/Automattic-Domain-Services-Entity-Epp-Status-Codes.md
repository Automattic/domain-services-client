# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Entity](../namespaces/automattic-domain-services-entity.md)\Epp_Status_Codes


---

### Methods

* public [__construct()](#method___construct)
* public [add_epp_code()](#method_add_epp_code)
* public [current()](#method_current)
* public [key()](#method_key)
* public [next()](#method_next)
* public [rewind()](#method_rewind)
* public [to_array()](#method_to_array)
* public [valid()](#method_valid)

---

### Details

* File: [lib/entity/epp-status-codes.php](../../lib/entity/epp-status-codes.php)
* Implements:
  * [\Iterator](../classes/Iterator.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services\Entity\Epp_Status_Code  ...epp_status_codes) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$epp_status_codes** | \Automattic\Domain_Services\Entity\Epp_Status_Code |  |

##### Returns:

```
mixed
```

---

<a id="method_add_epp_code"></a>
### add_epp_code

```
public add_epp_code(\Automattic\Domain_Services\Entity\Epp_Status_Code  epp_status_code) : void
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$epp_status_code** | \Automattic\Domain_Services\Entity\Epp_Status_Code |  |

##### Returns:

```
void
```

---

<a id="method_current"></a>
### current

```
public current() : ?\Automattic\Domain_Services\Entity\Epp_Status_Code
```

##### Summary

Functions to implement the Iterator interface

##### Returns:

```
?\Automattic\Domain_Services\Entity\Epp_Status_Code
```

---

<a id="method_key"></a>
### key

```
public key() : ?int
```

##### Returns:

```
?int
```

---

<a id="method_next"></a>
### next

```
public next() : void
```

##### Returns:

```
void
```

---

<a id="method_rewind"></a>
### rewind

```
public rewind() : void
```

##### Returns:

```
void
```

---

<a id="method_to_array"></a>
### to_array

```
public to_array() : array
```

##### Returns:

```
array
```

---

<a id="method_valid"></a>
### valid

```
public valid() : bool
```

##### Returns:

```
bool
```
