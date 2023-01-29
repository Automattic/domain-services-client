# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)\Api


---

### Methods

* public [__construct()](#method___construct)
* public [post()](#method_post)

---

### Details

* File: [lib/api.php](../../lib/api.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Configuration  configuration, \Automattic\Domain_Services_Client\Request\Factory  request_factory, \Automattic\Domain_Services_Client\Response\Factory  response_factory, \Psr\Http\Client\ClientInterface  http_client) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$configuration** | \Automattic\Domain_Services_Client\Configuration |  |
| **$request_factory** | \Automattic\Domain_Services_Client\Request\Factory |  |
| **$response_factory** | \Automattic\Domain_Services_Client\Response\Factory |  |
| **$http_client** | \Psr\Http\Client\ClientInterface |  |

##### Returns:

```
mixed
```

---

<a id="method_post"></a>
### post

```
public post(\Automattic\Domain_Services_Client\Command\Command_Interface  command, string  client_txn_id = &#039;&#039;) : \Automattic\Domain_Services_Client\Response\Response_Interface
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$command** | \Automattic\Domain_Services_Client\Command\Command_Interface |  |
| **$client_txn_id** | string | &#039;&#039; |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Command\Invalid_Format_Exception |  |
| \Automattic\Domain_Services_Client\Exception\Command\Missing_Option_Exception |  |
| \Automattic\Domain_Services_Client\Exception\Domain_Services_Exception |  |
| \JsonException |  |
| \Psr\Http\Client\ClientExceptionInterface |  |

##### Returns:

```
\Automattic\Domain_Services_Client\Response\Response_Interface
```
