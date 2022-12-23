Automattic\Domain_Services\Command\Event\Details
===============Requests details of an event- This command requests the details of a specific event using its ID.
- IDs can be fetched using the `Event\Enumerate` command.
- This command executes synchronously on the server.
- The corresponding response object will include the details of an event.
* Class name:Details
* Namespace:\Automattic\Domain_Services\Command\Event* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Event\Details::__construct(int event_id)Event_Details command constructor



* Visibility: **public**#### Arguments*event_id **int**
###get_event_idint Automattic\Domain_Services\Command\Event\Details::get_event_id()Gets the event ID



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_resource_pathstring Automattic\Domain_Services\Command\Event\Details::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**
###jsonSerializearray Automattic\Domain_Services\Command\Event\Details::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_event_id_array_keymixed Automattic\Domain_Services\Command\Event\Details::get_event_id_array_key()



* Visibility: **public*** This method is **static**.
###get_event_limit_array_keymixed Automattic\Domain_Services\Command\Event\Details::get_event_limit_array_key()



* Visibility: **public*** This method is **static**.