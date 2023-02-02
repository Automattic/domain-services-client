# Class: [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)[\Command](../namespaces/automattic-domain-services-client-command.md)[\Domain](../namespaces/automattic-domain-services-client-command-domain.md)[\Set](../namespaces/automattic-domain-services-client-command-domain-set.md)\Transferlock

## Summary:

Enables/Disables the transfer lock

## Description:

This commands requests either enabling or disabling the transfer lock on a specific domain.


---

### Methods

* public [__construct()](#method___construct)

---

### Details

* File: [lib/command/domain/set/transferlock.php](../../lib/command/domain/set/transferlock.php)
* Implements:
  * [\Automattic\Domain_Services_Client\Command\Command_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Interface.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Interface](../classes/Automattic-Domain-Services-Client-Command-Command-Serialize-Interface.md)
* Uses Traits:
  * [\Automattic\Domain_Services_Client\Command\Command_Trait](../classes/Automattic-Domain-Services-Client-Command-Command-Trait.md)
  * [\Automattic\Domain_Services_Client\Command\Command_Serialize_Trait](../classes/Automattic-Domain-Services-Client-Command-Command-Serialize-Trait.md)
* See Also:
  * [\Automattic\Domain_Services_Client\Response\Domain\Set\Transferlock](../classes/Automattic-Domain-Services-Client-Response-Domain-Set-Transferlock.md)

---

## Methods

<a id="method___construct"></a>
### __construct

```
public __construct(\Automattic\Domain_Services_Client\Entity\Domain_Name  domain, bool  transfer_lock) : mixed
```

##### Parameters:

| Name | Type | Default |
|------|------|---------|
| **$domain** | \Automattic\Domain_Services_Client\Entity\Domain_Name |  |
| **$transfer_lock** | bool |  |

##### Returns:

```
mixed
```
