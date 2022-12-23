Automattic\Domain_Services\Event\Domain\Restore\Success
===============Success event for a `Domain\Restore` command.This event is sent when a restore operation succeeds.
* Class name:Success
* Namespace:\Automattic\Domain_Services\Event\Domain\Restore* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###get_domain_statusstring|null Automattic\Domain_Services\Event\Domain\Restore\Success::get_domain_status()Gets the status of the domain immediately after the restore operation.



* Visibility: **public**
###get_expiration_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Restore\Success::get_expiration_date()Gets the expiration date of the domain after the restore operation.



* Visibility: **public**
###get_renewable_until\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Restore\Success::get_renewable_until()Gets the renewal date of the domain after the restore operation.



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Domain\Restore\Success::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Restore\Success::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Restore\Success::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Restore\Success::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Restore\Success::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Restore\Success::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Restore\Success::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Restore\Success::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Restore\Success::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Restore\Success::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Restore\Success::get_domain()



* Visibility: **public**