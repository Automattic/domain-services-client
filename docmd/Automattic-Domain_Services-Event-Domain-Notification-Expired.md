Automattic\Domain_Services\Event\Domain\Notification\Expired
===============Domain expired event- This event is generated when a domain expires
- When a domain expires, it usually enters the Auto-Renew Grace Period (ARGP) and can still be renewed for the
  regular renewal price
* Class name:Expired
* Namespace:\Automattic\Domain_Services\Event\Domain\Notification* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Event\Domain\Notification\Expired::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Notification\Expired::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Notification\Expired::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Notification\Expired::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Notification\Expired::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Notification\Expired::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Notification\Expired::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Notification\Expired::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Notification\Expired::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Notification\Expired::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Notification\Expired::get_domain()



* Visibility: **public**