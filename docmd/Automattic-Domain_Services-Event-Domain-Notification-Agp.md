Automattic\Domain_Services\Event\Domain\Notification\Agp
===============Domain entered the Add Grace Period (AGP) event- This event is generated when a domain enters the Add Grace Period (AGP)
- The AGP is a period (usually of 5 days) starting with the domain's registration when it can be deleted and its
  registration cost will be credited back to the registrar
- The idea of the AGP is to allow domains registered by mistake or with typos to be canceled with little to no
  penalty for the registrant or registrars
- Excessive cancellations in AGP may incur a penalty
- This event may contain an `agp_end_date` property which can be retrieved using the `get_agp_end_date` method
    - That is the date until which the domain is in AGP
* Class name:Agp
* Namespace:\Automattic\Domain_Services\Event\Domain\Notification* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###get_agp_end_date\DateTimeImmutable|null Automattic\Domain_Services\Event\Domain\Notification\Agp::get_agp_end_date()Returns the date until which a domain is in AGP, if available



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Domain\Notification\Agp::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Notification\Agp::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Notification\Agp::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Notification\Agp::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Notification\Agp::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Notification\Agp::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Notification\Agp::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Notification\Agp::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Notification\Agp::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Notification\Agp::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Notification\Agp::get_domain()



* Visibility: **public**