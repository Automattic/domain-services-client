# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Response](../namespaces/automattic-domain-services-client-response.md)\Code

## Summary:

Represents status codes and descriptions from the DSAPI command's responses


---

### Constants
* public [SUCCESS](#constant_SUCCESS)
* public [ACCEPTED](#constant_ACCEPTED)
* public [INVALID_COMMAND_NAME](#constant_INVALID_COMMAND_NAME)
* public [INVALID_COMMAND_OPTION](#constant_INVALID_COMMAND_OPTION)
* public [INVALID_ENTITY_VALUE](#constant_INVALID_ENTITY_VALUE)
* public [INVALID_ATTRIBUTE_NAME](#constant_INVALID_ATTRIBUTE_NAME)
* public [MISSING_REQUIRED_ATTRIBUTE](#constant_MISSING_REQUIRED_ATTRIBUTE)
* public [INVALID_ATTRIBUTE_VALUE_SYNTAX](#constant_INVALID_ATTRIBUTE_VALUE_SYNTAX)
* public [INVALID_OPTION_VALUE](#constant_INVALID_OPTION_VALUE)
* public [INVALID_COMMAND_FORMAT](#constant_INVALID_COMMAND_FORMAT)
* public [MISSING_REQUIRED_ENTITY](#constant_MISSING_REQUIRED_ENTITY)
* public [MISSING_COMMAND_OPTION](#constant_MISSING_COMMAND_OPTION)
* public [SERVER_CLOSING_CONNECTION](#constant_SERVER_CLOSING_CONNECTION)
* public [TOO_MANY_SESSIONS_OPEN](#constant_TOO_MANY_SESSIONS_OPEN)
* public [AUTHENTICATION_FAILED](#constant_AUTHENTICATION_FAILED)
* public [AUTHORIZATION_FAILED](#constant_AUTHORIZATION_FAILED)
* public [INVALID_ATTRIBUTE_VALUE](#constant_INVALID_ATTRIBUTE_VALUE)
* public [DOMAIN_ALREADY_REGISTERD](#constant_DOMAIN_ALREADY_REGISTERD)
* public [ENTITY_NOT_FOUND](#constant_ENTITY_NOT_FOUND)
* public [COMMAND_FAILED](#constant_COMMAND_FAILED)
* public [INVALID_EVENT_DATA](#constant_INVALID_EVENT_DATA)
* public [INVALID_EVENT_NAME](#constant_INVALID_EVENT_NAME)
* public [INVALID_VERIFICATION_DATA](#constant_INVALID_VERIFICATION_DATA)
* public [UNUSED_CONTACT_HANDLE](#constant_UNUSED_CONTACT_HANDLE)
* public [UNKNOWN_ERROR](#constant_UNKNOWN_ERROR)

---

### Methods

* public [get_description()](#method_get_description)

---

### Details

* File: [lib/response/code.php](../../lib/response/code.php)

---

## Constants
<a id="constant_SUCCESS"></a>
###### SUCCESS
```
SUCCESS = 200
```


<a id="constant_ACCEPTED"></a>
###### ACCEPTED
```
ACCEPTED = 202
```


<a id="constant_INVALID_COMMAND_NAME"></a>
###### INVALID_COMMAND_NAME
```
INVALID_COMMAND_NAME = 500
```


<a id="constant_INVALID_COMMAND_OPTION"></a>
###### INVALID_COMMAND_OPTION
```
INVALID_COMMAND_OPTION = 501
```


<a id="constant_INVALID_ENTITY_VALUE"></a>
###### INVALID_ENTITY_VALUE
```
INVALID_ENTITY_VALUE = 502
```


<a id="constant_INVALID_ATTRIBUTE_NAME"></a>
###### INVALID_ATTRIBUTE_NAME
```
INVALID_ATTRIBUTE_NAME = 503
```


<a id="constant_MISSING_REQUIRED_ATTRIBUTE"></a>
###### MISSING_REQUIRED_ATTRIBUTE
```
MISSING_REQUIRED_ATTRIBUTE = 504
```


<a id="constant_INVALID_ATTRIBUTE_VALUE_SYNTAX"></a>
###### INVALID_ATTRIBUTE_VALUE_SYNTAX
```
INVALID_ATTRIBUTE_VALUE_SYNTAX = 505
```


<a id="constant_INVALID_OPTION_VALUE"></a>
###### INVALID_OPTION_VALUE
```
INVALID_OPTION_VALUE = 506
```


<a id="constant_INVALID_COMMAND_FORMAT"></a>
###### INVALID_COMMAND_FORMAT
```
INVALID_COMMAND_FORMAT = 507
```


<a id="constant_MISSING_REQUIRED_ENTITY"></a>
###### MISSING_REQUIRED_ENTITY
```
MISSING_REQUIRED_ENTITY = 508
```


<a id="constant_MISSING_COMMAND_OPTION"></a>
###### MISSING_COMMAND_OPTION
```
MISSING_COMMAND_OPTION = 509
```


<a id="constant_SERVER_CLOSING_CONNECTION"></a>
###### SERVER_CLOSING_CONNECTION
```
SERVER_CLOSING_CONNECTION = 520
```


<a id="constant_TOO_MANY_SESSIONS_OPEN"></a>
###### TOO_MANY_SESSIONS_OPEN
```
TOO_MANY_SESSIONS_OPEN = 521
```


<a id="constant_AUTHENTICATION_FAILED"></a>
###### AUTHENTICATION_FAILED
```
AUTHENTICATION_FAILED = 530
```


<a id="constant_AUTHORIZATION_FAILED"></a>
###### AUTHORIZATION_FAILED
```
AUTHORIZATION_FAILED = 531
```


<a id="constant_INVALID_ATTRIBUTE_VALUE"></a>
###### INVALID_ATTRIBUTE_VALUE
```
INVALID_ATTRIBUTE_VALUE = 541
```


<a id="constant_DOMAIN_ALREADY_REGISTERD"></a>
###### DOMAIN_ALREADY_REGISTERD
```
DOMAIN_ALREADY_REGISTERD = 554
```


<a id="constant_ENTITY_NOT_FOUND"></a>
###### ENTITY_NOT_FOUND
```
ENTITY_NOT_FOUND = 545
```


<a id="constant_COMMAND_FAILED"></a>
###### COMMAND_FAILED
```
COMMAND_FAILED = 549
```


<a id="constant_INVALID_EVENT_DATA"></a>
###### INVALID_EVENT_DATA
```
INVALID_EVENT_DATA = 600
```


<a id="constant_INVALID_EVENT_NAME"></a>
###### INVALID_EVENT_NAME
```
INVALID_EVENT_NAME = 601
```


<a id="constant_INVALID_VERIFICATION_DATA"></a>
###### INVALID_VERIFICATION_DATA
```
INVALID_VERIFICATION_DATA = 602
```


<a id="constant_UNUSED_CONTACT_HANDLE"></a>
###### UNUSED_CONTACT_HANDLE
```
UNUSED_CONTACT_HANDLE = 603
```


<a id="constant_UNKNOWN_ERROR"></a>
###### UNKNOWN_ERROR
```
UNKNOWN_ERROR = 999
```



---

## Methods

<a id="method_get_description"></a>
### get_description

```
static public get_description(int  code) : string
```

##### Summary

Gets the description of a status code

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$code** | int |  |

##### Returns:

```
string
```
