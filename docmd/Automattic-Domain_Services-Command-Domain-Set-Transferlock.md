Automattic\Domain_Services\Command\Domain\Set\Transferlock
===============Enables/Disables the transfer lockThis commands requests either enabling or disabling the transfer lock on a specific domain.
* Class name:Transferlock
* Namespace:\Automattic\Domain_Services\Command\Domain\Set* This class implements:[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md),[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)Methods
-------
###__constructmixed Automattic\Domain_Services\Command\Domain\Set\Transferlock::__construct(\Automattic\Domain_Services\Entity\Domain_Name domain, bool transfer_lock)



* Visibility: **public**#### Arguments*domain **[Automattic\Domain_Services\Entity\Domain_Name](Automattic-Domain_Services-Entity-Domain_Name.md)***transfer_lock **bool**
###get_domain\Automattic\Domain_Services\Entity\Domain_Name Automattic\Domain_Services\Command\Domain\Set\Transferlock::get_domain()Gets the domain name for that command



* Visibility: **public**
###get_transfer_lockbool Automattic\Domain_Services\Command\Domain\Set\Transferlock::get_transfer_lock()Gets the transfer lock state to be applied



* Visibility: **public**
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.* This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###to_arrayarray Automattic\Domain_Services\Command\Command_Serialize_Interface::to_array()Returns the command parameters as an array for use when in the jsonSerialize() method



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Serialize_Interface](Automattic-Domain_Services-Command-Command_Serialize_Interface.md)
###get_resource_pathstring Automattic\Domain_Services\Command\Domain\Set\Transferlock::get_resource_path()Gets the path part for this command on the API endpoint.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public*** This method is defined by[Automattic\Domain_Services\Command\Command_Interface](Automattic-Domain_Services-Command-Command_Interface.md)#### Arguments*client_txn_id **string**
###jsonSerializearray Automattic\Domain_Services\Command\Domain\Set\Transferlock::jsonSerialize()Implements the JsonSerializable interface



* Visibility: **public**
###get_domain_name_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Transferlock::get_domain_name_array_key()



* Visibility: **public*** This method is **static**.
###get_transferlock_array_keymixed Automattic\Domain_Services\Command\Domain\Set\Transferlock::get_transferlock_array_key()



* Visibility: **public*** This method is **static**.