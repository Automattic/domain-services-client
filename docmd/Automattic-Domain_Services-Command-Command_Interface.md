Automattic\Domain_Services\Command\Command_Interface
===============* Interface name:Command_Interface
* Namespace:\Automattic\Domain_Services\Command
* This is an **interface**Constants
----------
###COMMANDconst COMMAND = 'command'
###PARAMSconst PARAMS = 'params'
###CLIENT_TXN_IDconst CLIENT_TXN_ID = 'client_txn_id'Methods
-------
###get_namestring Automattic\Domain_Services\Command\Command_Interface::get_name()Returns the command name that can be used to build command data



* Visibility: **public*** This method is **static**.
###get_client_txn_idstring Automattic\Domain_Services\Command\Command_Interface::get_client_txn_id()Gets the client transaction ID



* Visibility: **public**
###set_client_txn_idvoid Automattic\Domain_Services\Command\Command_Interface::set_client_txn_id(string client_txn_id)Sets the client transaction ID



* Visibility: **public**#### Arguments*client_txn_id **string**