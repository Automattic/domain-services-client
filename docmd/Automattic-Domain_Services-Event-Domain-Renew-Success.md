Automattic\Domain_Services\Event\Domain\Renew\Success
===============Domain renewed successfully eventThis event is generated when a domain renewal operation has completed successfully at the server.
* Class name:Success
* Namespace:\Automattic\Domain_Services\Event\Domain\Renew* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###get_domain_statusstring|null Automattic\Domain_Services\Event\Domain\Renew\Success::get_domain_status()Returns the domain status after the renewal operation



* Visibility: **public**
###get_expiration_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Renew\Success::get_expiration_date()Returns the domain expiration date after the renewal operation



* Visibility: **public**
###get_renewable_until\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Renew\Success::get_renewable_until()Returns the date until which the domain can be renewed after the renewal operation



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Domain\Renew\Success::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Renew\Success::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Renew\Success::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Renew\Success::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Renew\Success::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Renew\Success::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Renew\Success::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Renew\Success::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Renew\Success::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Renew\Success::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Renew\Success::get_domain()



* Visibility: **public**