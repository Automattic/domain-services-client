# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Email](../namespaces/automattic-domain-services-client-command-email.md)[\Send](../namespaces/automattic-domain-services-client-command-email-send.md)\Verification

## Summary:

Resend email for domain contact verification


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/email/send/verification.php](../../lib/command/email/send/verification.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Set\Contacts](../classes/Automattic-Domain-Services-Client-Response-Domain-Set-Contacts.md)
  * [\Automattic\Domain_Services_Client\Entity\Contact_Id](../classes/Automattic-Domain-Services-Client-Entity-Contact-Id.md)
  * [\Automattic\Domain_Services_Client\Entity\Contact_Information](../classes/Automattic-Domain-Services-Client-Entity-Contact-Information.md)
  * [\Automattic\Domain_Services_Client\Entity\Domain_Contacts](../classes/Automattic-Domain-Services-Client-Entity-Domain-Contacts.md)
  * [\Automattic\Domain_Services_Client\Entity\Domain_Contact](../classes/Automattic-Domain-Services-Client-Entity-Domain-Contact.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Email_Address  email_address) : mixed
```

##### Summary

Constructs a `Email\Send\Verification` command

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$email_address** | \Automattic\Domain_Services_Client\Entity\Email_Address |  |

##### Throws:

| Type | Description |
|------|-------------|
| \Automattic\Domain_Services_Client\Exception\Entity\Invalid_Value_Exception |  |

##### Returns:

```
mixed
```
