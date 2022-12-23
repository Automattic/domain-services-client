Automattic\Domain_Services\Configuration
===============
* Class name:Configuration
* Namespace:\Automattic\Domain_ServicesConstants
----------
###BOOLEAN_FORMAT_INTconst BOOLEAN_FORMAT_INT = 'int'
###BOOLEAN_FORMAT_STRINGconst BOOLEAN_FORMAT_STRING = 'string'Methods
-------
###set_api_key$this Automattic\Domain_Services\Configuration::set_api_key(string api_key_identifier, string key)Sets API key



* Visibility: **public**#### Arguments*api_key_identifier **string** -API key identifier (authentication scheme)*key **string** -API key or token
###get_api_keynull|string Automattic\Domain_Services\Configuration::get_api_key(string api_key_identifier)Gets API key



* Visibility: **public**#### Arguments*api_key_identifier **string** -API key identifier (authentication scheme)
###set_api_key_prefix$this Automattic\Domain_Services\Configuration::set_api_key_prefix(string api_key_identifier, string prefix)Sets the prefix for API key (e.g. Bearer)



* Visibility: **public**#### Arguments*api_key_identifier **string** -API key identifier (authentication scheme)*prefix **string** -API key prefix, e.g. Bearer
###get_api_key_prefixnull|string Automattic\Domain_Services\Configuration::get_api_key_prefix(string api_key_identifier)Gets API key prefix



* Visibility: **public**#### Arguments*api_key_identifier **string** -API key identifier (authentication scheme)
###set_access_token$this Automattic\Domain_Services\Configuration::set_access_token(string access_token)Sets the access token for OAuth



* Visibility: **public**#### Arguments*access_token **string** -Token for OAuth
###get_access_tokenstring Automattic\Domain_Services\Configuration::get_access_token()Gets the access token for OAuth



* Visibility: **public**
###set_boolean_format_for_query_string$this Automattic\Domain_Services\Configuration::set_boolean_format_for_query_string(string boolean_format_for_query_string)Sets boolean format for query string.



* Visibility: **public**#### Arguments*boolean_format_for_query_string **string** -Boolean format for query string
###get_boolean_format_for_query_stringstring Automattic\Domain_Services\Configuration::get_boolean_format_for_query_string()Gets boolean format for query string.



* Visibility: **public**
###set_username$this Automattic\Domain_Services\Configuration::set_username(string username)Sets the username for HTTP basic authentication



* Visibility: **public**#### Arguments*username **string** -Username for HTTP basic authentication
###get_usernamestring Automattic\Domain_Services\Configuration::get_username()Gets the username for HTTP basic authentication



* Visibility: **public**
###set_password$this Automattic\Domain_Services\Configuration::set_password(string password)Sets the password for HTTP basic authentication



* Visibility: **public**#### Arguments*password **string** -Password for HTTP basic authentication
###get_passwordstring Automattic\Domain_Services\Configuration::get_password()Gets the password for HTTP basic authentication



* Visibility: **public**
###set_host$this Automattic\Domain_Services\Configuration::set_host(string host)Sets the host



* Visibility: **public**#### Arguments*host **string** -Host
###get_hoststring Automattic\Domain_Services\Configuration::get_host()Gets the host



* Visibility: **public**
###set_user_agent$this Automattic\Domain_Services\Configuration::set_user_agent(string user_agent)Sets the user agent of the api client



* Visibility: **public**#### Arguments*user_agent **string** -the user agent of the api client
###get_user_agentstring Automattic\Domain_Services\Configuration::get_user_agent()Gets the user agent of the api client



* Visibility: **public**
###set_debug$this Automattic\Domain_Services\Configuration::set_debug(bool debug)Sets debug flag



* Visibility: **public**#### Arguments*debug **bool** -Debug flag
###get_debugbool Automattic\Domain_Services\Configuration::get_debug()Gets the debug flag



* Visibility: **public**
###set_debug_file$this Automattic\Domain_Services\Configuration::set_debug_file(string debug_file)Sets the debug file



* Visibility: **public**#### Arguments*debug_file **string** -Debug file
###get_debug_filestring Automattic\Domain_Services\Configuration::get_debug_file()Gets the debug file



* Visibility: **public**
###set_temp_folder_path$this Automattic\Domain_Services\Configuration::set_temp_folder_path(string temp_folder_path)Sets the temp folder path



* Visibility: **public**#### Arguments*temp_folder_path **string** -Temp folder path
###get_temp_folder_pathstring Automattic\Domain_Services\Configuration::get_temp_folder_path()Gets the temp folder path



* Visibility: **public*** This method is **static**.
###get_default_configuration\Automattic\Domain_Services\Configuration Automattic\Domain_Services\Configuration::get_default_configuration()Gets the default configuration instance



* Visibility: **public*** This method is **static**.
###set_default_configurationvoid Automattic\Domain_Services\Configuration::set_default_configuration(\Automattic\Domain_Services\Configuration config)Sets the default configuration instance



* Visibility: **public*** This method is **static**.#### Arguments*config **[Automattic\Domain_Services\Configuration](Automattic-Domain_Services-Configuration.md)** -An instance of the Configuration Object
###to_debug_reportstring Automattic\Domain_Services\Configuration::to_debug_report()Gets the essential information for debugging



* Visibility: **public*** This method is **static**.
###get_api_key_with_prefixnull|string Automattic\Domain_Services\Configuration::get_api_key_with_prefix(string api_key_identifier)Get API key (with prefix if set)



* Visibility: **public**#### Arguments*api_key_identifier **string** -name of apikey
###get_host_settingsarray Automattic\Domain_Services\Configuration::get_host_settings()Returns an array of host settings



* Visibility: **public**
###get_host_stringstring Automattic\Domain_Services\Configuration::get_host_string(array host_settings, int host_index, array|null variables)Returns URL based on host settings, index and variables



* Visibility: **public*** This method is **static**.#### Arguments*host_settings **array** -array of host settings, generated from getHostSettings() or equivalent from the API clients*host_index **int** -index of the host settings*variables **array|null** -hash of variable and the corresponding value (optional)
###get_host_from_settingsstring Automattic\Domain_Services\Configuration::get_host_from_settings(int index, array|null variables)Returns URL based on the index and variables



* Visibility: **public**#### Arguments*index **int** -index of the host settings*variables **array|null** -hash of variable and the corresponding value (optional)