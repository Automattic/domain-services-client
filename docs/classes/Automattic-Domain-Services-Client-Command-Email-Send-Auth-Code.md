# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Email](../namespaces/automattic-domain-services-client-command-email.md)[\Send](../namespaces/automattic-domain-services-client-command-email-send.md)\Auth_Code

## Summary:

Send domain auth code to the domain owner


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/email/send/auth-code.php](../../lib/command/email/send/auth-code.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Email\Send\Auth_Code](../classes/Automattic-Domain-Services-Client-Response-Email-Send-Auth-Code.md)
  * [\Automattic\Domain_Services_Client\Entity\Domain_Name](../classes/Automattic-Domain-Services-Client-Entity-Domain-Name.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain) : mixed
```

##### Summary

Constructs a `Email\Send\Auth_Code` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```
