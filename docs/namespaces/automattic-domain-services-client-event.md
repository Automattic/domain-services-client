# [\Automattic](../namespaces/automattic.md)[\Domain_Services_Client](../namespaces/automattic-domain-services-client.md)\Event

### Namespaces

* [\Automattic\Domain_Services_Client\Event\Domain](../namespaces/automattic-domain-services-client-event-domain.md)

### Traits

| Name | Summary |
|------|---------|
| [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Trait](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Trait.md) | Used by all events resulting from running an asynchronous command |
| [\Automattic\Domain_Services_Client\Event\Created_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Created-Date-Trait.md) | Trait that adds the `get_created_date` method to an event |
| [\Automattic\Domain_Services_Client\Event\Data_Trait](../classes/Automattic-Domain-Services-Client-Event-Data-Trait.md) | Trait that defines data access methods common to all event classes. |
| [\Automattic\Domain_Services_Client\Event\Error_Trait](../classes/Automattic-Domain-Services-Client-Event-Error-Trait.md) | Trait that specifies methods common to all error event classes. |
| [\Automattic\Domain_Services_Client\Event\Expiration_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Expiration-Date-Trait.md) | Trait that adds the `get_expiration_date` method to an event |
| [\Automattic\Domain_Services_Client\Event\Object_Type_Domain_Trait](../classes/Automattic-Domain-Services-Client-Event-Object-Type-Domain-Trait.md) | Trait for objects that are associated with a domain. |
| [\Automattic\Domain_Services_Client\Event\Renewable_Until_Trait](../classes/Automattic-Domain-Services-Client-Event-Renewable-Until-Trait.md) | Trait that adds the `renewable_until` method to an event |
| [\Automattic\Domain_Services_Client\Event\Transfer_Trait](../classes/Automattic-Domain-Services-Client-Event-Transfer-Trait.md) | Trait that adds transfer-related methods to an event. |
| [\Automattic\Domain_Services_Client\Event\TransferLocked_Trait](../classes/Automattic-Domain-Services-Client-Event-TransferLocked-Trait.md) | Trait that adds the `get_transferlocked_until_date` method to an event |
| [\Automattic\Domain_Services_Client\Event\Unverified_Contact_Suspension_Date_Trait](../classes/Automattic-Domain-Services-Client-Event-Unverified-Contact-Suspension-Date-Trait.md) | Trait that adds the `get_unverified_contact_suspension_date` method to an event |


### Interfaces

| Name | Summary |
|------|---------|
| [\Automattic\Domain_Services_Client\Event\Async_Command_Related_Interface](../classes/Automattic-Domain-Services-Client-Event-Async-Command-Related-Interface.md) | Implemented by all events resulting from running an asynchronous command |
| [\Automattic\Domain_Services_Client\Event\Event_Interface](../classes/Automattic-Domain-Services-Client-Event-Event-Interface.md) | An interface used by all event classes. |

### Classes

| Name | Summary |
|------|---------|
| [\Automattic\Domain_Services_Client\Event\Factory](../classes/Automattic-Domain-Services-Client-Event-Factory.md) | Factory class used to build an event from the provided data. |
