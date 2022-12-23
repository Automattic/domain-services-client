Automattic\Domain_Services\Event\Contact\Verification\Notify
===============Verification notify eventThis event indicates a change in the contact's status. It's usually generated when a contact is marked as verified.
* Class name:Notify
* Namespace:\Automattic\Domain_Services\Event\Contact\Verification* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###is_verifiedbool Automattic\Domain_Services\Event\Contact\Verification\Notify::is_verified()Returns tha verification status of the contact



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Contact\Verification\Notify::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Contact\Verification\Notify::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Contact\Verification\Notify::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Contact\Verification\Notify::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Contact\Verification\Notify::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Contact\Verification\Notify::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Contact\Verification\Notify::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Contact\Verification\Notify::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Contact\Verification\Notify::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Contact\Verification\Notify::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_contact_idmixed Automattic\Domain_Services\Event\Contact\Verification\Notify::get_contact_id()



* Visibility: **public**