# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services](../namespaces/automattic-domain-services.md)[\Response](../namespaces/automattic-domain-services-response.md)\Factory


---

### Methods

* public [build_response()](#method_build_response)

---

### Details

* File: [lib/response/factory.php](../../lib/response/factory.php)

---

## Methods

<a id="method_build_response"></a>
### build_response

```
public build_response(\Automattic\Domain_Services\Command\Command_Interface  command, array  response) : \Automattic\Domain_Services\Response\Response_Interface
```

##### SummaryBuilds a response from the provided response data
##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$command** | \Automattic\Domain_Services\Command\Command_Interface |  |
| **$response** | array |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services\Exception\Command\Invalid_Format_Exception |  |
| \Automattic\Domain_Services\Exception\Command\Missing_Option_Exception |  |
| \Automattic\Domain_Services\Exception\Domain_Services_Exception |  |

##### Returns:

```
\Automattic\Domain_Services\Response\Response_Interface
```
