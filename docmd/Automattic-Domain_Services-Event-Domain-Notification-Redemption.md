Automattic\Domain_Services\Event\Domain\Notification\Redemption
===============Domain entered redemption period event- This event is generated when a domain enters the redemption period
- A domain enters redemption when the Auto-Renew Grace Period (ARGP) ends and the domain wasn't renewed
- A domain in redemption can still be restored, but a redemption fee (which is costlier than a renewal fee) will be
  charged
- If the redemption period ends, the domain goes into `pending_delete` status at the registry for 5 days and, after
  that, it's usually released and may become available for registration again
- This event contains a `redemption_end_date` property which can be retrieved using the `get_redemption_end_date`
  method
    - That is the date until which the domain is in redemption
* Class name:Redemption
* Namespace:\Automattic\Domain_Services\Event\Domain\Notification* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###get_redemption_end_date\DateTimeImmutable|null Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_redemption_end_date()Returns the date until which a domain is in redemption, if available



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Domain\Notification\Redemption::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Notification\Redemption::get_domain()



* Visibility: **public**