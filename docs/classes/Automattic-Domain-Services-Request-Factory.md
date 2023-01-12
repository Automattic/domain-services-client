# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Request](../namespaces/automattic-domain-services-request.md)\Factory


---

### Methods

* public [__construct()](#method___construct)
* public [createRequest()](#method_createRequest)

---

### Details

* File: [lib/request/factory.php](../../lib/request/factory.php)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Psr\Http\Message\RequestFactoryInterface  request_factory, \Psr\Http\Message\StreamFactoryInterface  stream_factory) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$request_factory** | \Psr\Http\Message\RequestFactoryInterface |  |
| **$stream_factory** | \Psr\Http\Message\StreamFactoryInterface |  |

##### Returns:

```
mixed
```

---

<a id="method_createRequest"></a>
### createRequest

```
public createRequest(string  method, string  uri, string  body = &#039;&#039;, array  headers = []) : \Psr\Http\Message\RequestInterface
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$method** | string |  |
| **$uri** | string |  |
| **$body** | string | &#039;&#039; |
| **$headers** | array | [] |

##### Returns:

```
\Psr\Http\Message\RequestInterface
```
