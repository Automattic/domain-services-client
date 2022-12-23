Automattic\Domain_Services\Event\Domain\Register\Success
===============Success event for a `Domain\Register` command.This event is sent when a register operation succeeds.
* Class name:Success
* Namespace:\Automattic\Domain_Services\Event\Domain\Register* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###get_domain_statusesnull|\Automattic\Domain_Services\Entity\Epp_Status_Codes Automattic\Domain_Services\Event\Domain\Register\Success::get_domain_statuses()Gets the list of domain statuses



* Visibility: **public**
###get_created_datenull|\DateTimeInterface Automattic\Domain_Services\Event\Domain\Register\Success::get_created_date()Gets the date the domain was created



* Visibility: **public**
###get_expiration_datenull|\DateTimeInterface Automattic\Domain_Services\Event\Domain\Register\Success::get_expiration_date()Gets the domain expiration date



* Visibility: **public**
###get_renewable_untilnull|\DateTimeInterface Automattic\Domain_Services\Event\Domain\Register\Success::get_renewable_until()Get the last date to renew the domain



* Visibility: **public**
###get_unverified_contact_suspension_datenull|\DateTimeInterface Automattic\Domain_Services\Event\Domain\Register\Success::get_unverified_contact_suspension_date()Gets the date when the domain will be suspended if the contact information is not verified



* Visibility: **public**
###get_contactsnull|\Automattic\Domain_Services\Entity\Domain_Contacts Automattic\Domain_Services\Event\Domain\Register\Success::get_contacts()Gets the contacts set for the domain



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Domain\Register\Success::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Register\Success::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Register\Success::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Register\Success::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Register\Success::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Register\Success::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Register\Success::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Register\Success::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Register\Success::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Register\Success::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Register\Success::get_domain()



* Visibility: **public**