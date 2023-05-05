# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Request](../namespaces/automattic-domain-services-client-request.md)\Factory

## Summary:

Factory for creating PSR-7 requests.


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

##### Summary

Constructs a `Request\Factory` object.

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

##### Summary

Creates a new request object with the specified method, URI, and optional body and headers

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
