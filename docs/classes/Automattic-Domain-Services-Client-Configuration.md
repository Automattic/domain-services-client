# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)\Configuration


---

### Constants
* public [BOOLEAN_FORMAT_INT](#constant_BOOLEAN_FORMAT_INT)
* public [BOOLEAN_FORMAT_STRING](#constant_BOOLEAN_FORMAT_STRING)

---

### Methods

* public [get_access_token()](#method_get_access_token)
* public [get_api_key()](#method_get_api_key)
* public [get_api_key_prefix()](#method_get_api_key_prefix)
* public [get_api_key_with_prefix()](#method_get_api_key_with_prefix)
* public [get_boolean_format_for_query_string()](#method_get_boolean_format_for_query_string)
* public [get_debug()](#method_get_debug)
* public [get_debug_file()](#method_get_debug_file)
* public [get_default_configuration()](#method_get_default_configuration)
* public [get_host()](#method_get_host)
* public [get_host_from_settings()](#method_get_host_from_settings)
* public [get_host_settings()](#method_get_host_settings)
* public [get_host_string()](#method_get_host_string)
* public [get_password()](#method_get_password)
* public [get_temp_folder_path()](#method_get_temp_folder_path)
* public [get_user_agent()](#method_get_user_agent)
* public [get_username()](#method_get_username)
* public [set_access_token()](#method_set_access_token)
* public [set_api_key()](#method_set_api_key)
* public [set_api_key_prefix()](#method_set_api_key_prefix)
* public [set_boolean_format_for_query_string()](#method_set_boolean_format_for_query_string)
* public [set_debug()](#method_set_debug)
* public [set_debug_file()](#method_set_debug_file)
* public [set_default_configuration()](#method_set_default_configuration)
* public [set_host()](#method_set_host)
* public [set_password()](#method_set_password)
* public [set_temp_folder_path()](#method_set_temp_folder_path)
* public [set_user_agent()](#method_set_user_agent)
* public [set_username()](#method_set_username)
* public [to_debug_report()](#method_to_debug_report)

---

### Details

* File: [lib/configuration.php](../../lib/configuration.php)

---

## Constants
<a id="constant_BOOLEAN_FORMAT_INT"></a>
###### BOOLEAN_FORMAT_INT
```
BOOLEAN_FORMAT_INT = 'int'
```


<a id="constant_BOOLEAN_FORMAT_STRING"></a>
###### BOOLEAN_FORMAT_STRING
```
BOOLEAN_FORMAT_STRING = 'string'
```



---

## Methods

<a id="method_get_access_token"></a>
### get_access_token

```
public get_access_token() : string
```

##### Summary

Gets the access token for OAuth

##### Returns:

```
string
```
Access token for OAuth

---

<a id="method_get_api_key"></a>
### get_api_key

```
public get_api_key(string  api_key_identifier) : null|string
```

##### Summary

Gets API key

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$api_key_identifier** | string |  |

##### Returns:

```
null|string
```
API key or token

---

<a id="method_get_api_key_prefix"></a>
### get_api_key_prefix

```
public get_api_key_prefix(string  api_key_identifier) : null|string
```

##### Summary

Gets API key prefix

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$api_key_identifier** | string |  |

##### Returns:

```
null|string
```

---

<a id="method_get_api_key_with_prefix"></a>
### get_api_key_with_prefix

```
public get_api_key_with_prefix(string  api_key_identifier) : null|string
```

##### Summary

Get API key (with prefix if set)

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$api_key_identifier** | string |  |

##### Returns:

```
null|string
```
API key with the prefix

---

<a id="method_get_boolean_format_for_query_string"></a>
### get_boolean_format_for_query_string

```
public get_boolean_format_for_query_string() : string
```

##### Summary

Gets boolean format for query string.

##### Returns:

```
string
```
Boolean format for query string

---

<a id="method_get_debug"></a>
### get_debug

```
public get_debug() : bool
```

##### Summary

Gets the debug flag

##### Returns:

```
bool
```

---

<a id="method_get_debug_file"></a>
### get_debug_file

```
public get_debug_file() : string
```

##### Summary

Gets the debug file

##### Returns:

```
string
```

---

<a id="method_get_default_configuration"></a>
### get_default_configuration

```
static public get_default_configuration() : \Automattic\Domain_Services_Client\Configuration
```

##### Summary

Gets the default configuration instance

##### Returns:

```
\Automattic\Domain_Services_Client\Configuration
```

---

<a id="method_get_host"></a>
### get_host

```
public get_host() : string
```

##### Summary

Gets the host

##### Returns:

```
string
```
Host

---

<a id="method_get_host_from_settings"></a>
### get_host_from_settings

```
public get_host_from_settings(int  index, array|null  variables = null) : string
```

##### Summary

Returns URL based on the index and variables

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$index** | int |  |
| **$variables** | array|null | null |

##### Returns:

```
string
```
URL based on host settings

---

<a id="method_get_host_settings"></a>
### get_host_settings

```
public get_host_settings() : array
```

##### Summary

Returns an array of host settings

##### Returns:

```
array
```
an array of host settings

---

<a id="method_get_host_string"></a>
### get_host_string

```
static public get_host_string(array  host_settings, int  host_index, array|null  variables = null) : string
```

##### Summary

Returns URL based on host settings, index and variables

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$host_settings** | array |  |
| **$host_index** | int |  |
| **$variables** | array|null | null |

##### Returns:

```
string
```
URL based on host settings

---

<a id="method_get_password"></a>
### get_password

```
public get_password() : string
```

##### Summary

Gets the password for HTTP basic authentication

##### Returns:

```
string
```
Password for HTTP basic authentication

---

<a id="method_get_temp_folder_path"></a>
### get_temp_folder_path

```
static public get_temp_folder_path() : string
```

##### Summary

Gets the temp folder path

##### Returns:

```
string
```
Temp folder path

---

<a id="method_get_user_agent"></a>
### get_user_agent

```
public get_user_agent() : string
```

##### Summary

Gets the user agent of the api client

##### Returns:

```
string
```
user agent

---

<a id="method_get_username"></a>
### get_username

```
public get_username() : string
```

##### Summary

Gets the username for HTTP basic authentication

##### Returns:

```
string
```
Username for HTTP basic authentication

---

<a id="method_set_access_token"></a>
### set_access_token

```
public set_access_token(string  access_token) : $this
```

##### Summary

Sets the access token for OAuth

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$access_token** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_api_key"></a>
### set_api_key

```
public set_api_key(string  api_key_identifier, string  key) : $this
```

##### Summary

Sets API key

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$api_key_identifier** | string |  |
| **$key** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_api_key_prefix"></a>
### set_api_key_prefix

```
public set_api_key_prefix(string  api_key_identifier, string  prefix) : $this
```

##### Summary

Sets the prefix for API key (e.g. Bearer)

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$api_key_identifier** | string |  |
| **$prefix** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_boolean_format_for_query_string"></a>
### set_boolean_format_for_query_string

```
public set_boolean_format_for_query_string(string  boolean_format_for_query_string) : $this
```

##### Summary

Sets boolean format for query string.

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$boolean_format_for_query_string** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_debug"></a>
### set_debug

```
public set_debug(bool  debug) : $this
```

##### Summary

Sets debug flag

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$debug** | bool |  |

##### Returns:

```
$this
```

---

<a id="method_set_debug_file"></a>
### set_debug_file

```
public set_debug_file(string  debug_file) : $this
```

##### Summary

Sets the debug file

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$debug_file** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_default_configuration"></a>
### set_default_configuration

```
static public set_default_configuration(\Automattic\Domain_Services_Client\Configuration  config) : void
```

##### Summary

Sets the default configuration instance

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$config** | \Automattic\Domain_Services_Client\Configuration |  |

##### Returns:

```
void
```

---

<a id="method_set_host"></a>
### set_host

```
public set_host(string  host) : $this
```

##### Summary

Sets the host

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$host** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_password"></a>
### set_password

```
public set_password(string  password) : $this
```

##### Summary

Sets the password for HTTP basic authentication

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$password** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_temp_folder_path"></a>
### set_temp_folder_path

```
public set_temp_folder_path(string  temp_folder_path) : $this
```

##### Summary

Sets the temp folder path

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$temp_folder_path** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_user_agent"></a>
### set_user_agent

```
public set_user_agent(string  user_agent) : $this
```

##### Summary

Sets the user agent of the api client

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$user_agent** | string |  |

##### Returns:

```
$this
```

---

<a id="method_set_username"></a>
### set_username

```
public set_username(string  username) : $this
```

##### Summary

Sets the username for HTTP basic authentication

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$username** | string |  |

##### Returns:

```
$this
```

---

<a id="method_to_debug_report"></a>
### to_debug_report

```
static public to_debug_report() : string
```

##### Summary

Gets the essential information for debugging

##### Returns:

```
string
```
The report for debugging
