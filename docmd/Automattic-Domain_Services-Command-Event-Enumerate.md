Automattic\Domain_Services\Command\Event\Enumerate
===============Requests a list of unacknowledged eventsThis command is used to request a list of the unacknowledged events. On success, the response object will include an
array of events in ascending order by age (oldest to newest). The maximum number of events returned in the response,
can be set using the $limit property for this command. The limit defaults to 50 if none is set.
- This command executes synchronously on the server.
- The corresponding response object will include the list of events.
* Class name:Enumerate
* Namespace:\Automattic\Domain_Services\Command\Event* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Event\Enumerate::__construct(null|int limit)Class constructor



* Visibility: **public**#### Arguments*limit **null|int** -Max count of returned events.
###get_limitint Automattic\Domain_Services\Command\Event\Enumerate::get_limit()Gets the maximum number of events to return in the response.



* Visibility: **public**
###set_limit\Automattic\Domain_Services\Command\Event\Enumerate Automattic\Domain_Services\Command\Event\Enumerate::set_limit(int limit)Sets the maximum number of events to return in the response.



* Visibility: **public**#### Arguments*limit **int**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_event_id_array_keymixed Automattic\Domain_Services\Command\Event\Enumerate::get_event_id_array_key()



* Visibility: **public*** This method is **static**.
###get_event_limit_array_keymixed Automattic\Domain_Services\Command\Event\Enumerate::get_event_limit_array_key()



* Visibility: **public*** This method is **static**.
###jsonSerializearray Automattic\Domain_Services\Command\Event\Enumerate::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_resource_pathstring Automattic\Domain_Services\Command\Event\Enumerate::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**