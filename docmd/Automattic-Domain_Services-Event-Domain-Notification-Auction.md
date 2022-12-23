Automattic\Domain_Services\Event\Domain\Notification\Auction
===============Domain entered auction phase event- This event is generated when a domain enters an expiry auction phase
- There are three domain auction phases
    - `parked` - 5 days after expiration, the domain's name servers and DNS records will be changed to our auction
       partners' servers
    - `submitted` - 21 days after expiration, the domain is appraised by our auction partners
    - `active` - 30 days after expiration, if the domain is selected for auction, is when the actual auction starts.
      This phase lasts until day 43 after the domain expiration date
- After day 43, if the domain was not sold in auction, it will enter the redemption phase as usual
- This event contains two properties:
    - `auction_status` - current expiry auction status phase (will be either `PARKED`, `SUBMITTED` or `ACTIVE`),
      can be retrieved using the `get_auction_status` method
    - `auction_status_end_date` - date until which the domain is in the current auction phase, can be retrieved using
      the `get_auction_status_end_date` method
* Class name:Auction
* Namespace:\Automattic\Domain_Services\Event\Domain\Notification* This class implements:[Automattic\Domain_Services\Event\Event_Interface](Automattic-Domain_Services-Event-Event_Interface.md)Methods
-------
###get_auction_statusstring|null Automattic\Domain_Services\Event\Domain\Notification\Auction::get_auction_status()This should be one of PARKED, SUBMITTED, ACTIVE



* Visibility: **public**
###get_auction_status_end_date\DateTimeImmutable|null Automattic\Domain_Services\Event\Domain\Notification\Auction::get_auction_status_end_date()This is the date at which the domain will exit the current auction state



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Event\Domain\Notification\Auction::__construct(array data)Constructs an event object



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Event\Domain\Notification\Auction::get_data_by_key(string key)Gets the value of the event data specified by the given key.



* Visibility: **public**#### Arguments*key **string**
###get_idint Automattic\Domain_Services\Event\Domain\Notification\Auction::get_id()Gets the event ID



* Visibility: **public**
###get_event_classstring Automattic\Domain_Services\Event\Domain\Notification\Auction::get_event_class()Gets the event class



* Visibility: **public**
###get_event_subclassstring Automattic\Domain_Services\Event\Domain\Notification\Auction::get_event_subclass()Gets the event subclass



* Visibility: **public**
###get_object_typestring Automattic\Domain_Services\Event\Domain\Notification\Auction::get_object_type()Gets the type of object that this event references (ex. 'domain' or 'contact')



* Visibility: **public**
###get_object_idstring Automattic\Domain_Services\Event\Domain\Notification\Auction::get_object_id()Gets the ID of the object that this event references.

- The contact ID for a contact object type
- The domain name for a domain object type

* Visibility: **public**
###get_event_date\DateTimeInterface Automattic\Domain_Services\Event\Domain\Notification\Auction::get_event_date()Gets the date this event was generated.



* Visibility: **public**
###get_acknowledged_date\DateTimeInterface|null Automattic\Domain_Services\Event\Domain\Notification\Auction::get_acknowledged_date()Gets the date this event was acknowledged.



* Visibility: **public**
###get_event_dataarray Automattic\Domain_Services\Event\Domain\Notification\Auction::get_event_data()Gets all the event data as an array



* Visibility: **public**
###get_domainmixed Automattic\Domain_Services\Event\Domain\Notification\Auction::get_domain()



* Visibility: **public**