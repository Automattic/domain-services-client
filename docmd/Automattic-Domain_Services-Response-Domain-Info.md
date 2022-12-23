Automattic\Domain_Services\Response\Domain\Info
===============Response of a `Domain\Info` commandThis is the response returned from a successful execution of the `Domain\Info` command. It includes all the current
attributes of the domain at the registry.
* Class name:Info
* Namespace:\Automattic\Domain_Services\Response\Domain* This class implements:[Automattic\Domain_Services\Response\Response_Interface](Automattic-Domain_Services-Response-Response_Interface.md)Methods
-------
###get_auth_codestring Automattic\Domain_Services\Response\Domain\Info::get_auth_code()Gets the domain EPP auth code



* Visibility: **public**
###get_contacts\Automattic\Domain_Services\Entity\Domain_Contacts Automattic\Domain_Services\Response\Domain\Info::get_contacts()Gets the contacts associated with this domain



* Visibility: **public**
###get_created_datestring|null Automattic\Domain_Services\Response\Domain\Info::get_created_date()Gets the date the domain was registered to the reseller's account



* Visibility: **public**
###get_expiration_datestring|null Automattic\Domain_Services\Response\Domain\Info::get_expiration_date()Gets the date the domain registration will expire



* Visibility: **public**
###get_dnssecstring|null Automattic\Domain_Services\Response\Domain\Info::get_dnssec()Gets the DNSSec key data for the domain, if any exists



* Visibility: **public**
###get_dnssec_ds_dsatastring|null Automattic\Domain_Services\Response\Domain\Info::get_dnssec_ds_dsata()Gets the DNSSec DS data for the domain, if any exists



* Visibility: **public**
###get_epp_statuses\Automattic\Domain_Services\Entity\Epp_Status_Codes Automattic\Domain_Services\Response\Domain\Info::get_epp_statuses()Gets the current EPP status codes for the domain



* Visibility: **public**
###get_name_servers\Automattic\Domain_Services\Entity\Nameservers|null Automattic\Domain_Services\Response\Domain\Info::get_name_servers()Gets the name servers set at the registry for this domain



* Visibility: **public**
###get_paid_until\DateTimeInterface|null Automattic\Domain_Services\Response\Domain\Info::get_paid_until()Gets the date until which the domain has been paid for



* Visibility: **public**
###get_privacy_setting\Automattic\Domain_Services\Entity\Whois_Privacy|null Automattic\Domain_Services\Response\Domain\Info::get_privacy_setting()Gets the whois privacy setting for the domain



* Visibility: **public**
###get_registrar_transfer_date\DateTimeInterface|null Automattic\Domain_Services\Response\Domain\Info::get_registrar_transfer_date()Gets the date which the domain was transferred to the reseller's account, if the domain was added via an inbound
transfer



* Visibility: **public**
###get_renewal_modestring|null Automattic\Domain_Services\Response\Domain\Info::get_renewal_mode()Gets the renewal mode of this domain



* Visibility: **public**
###get_rgp_statusstring|null Automattic\Domain_Services\Response\Domain\Info::get_rgp_status()Gets the Renewal Grace Period (RGP) status for this domain. This is usually one of the following:
- `addPeriod`: The grace period after initial registration of the domain name. If the reseller deletes the domain
     during this period, the registry may provide a credit for the cost of the registration.

- `autoRenewPeriod`: The grace period after a domain name expires. The domain may be renewed at the regular cost
during this period.

* Visibility: **public**
###get_transfer_lockbool|null Automattic\Domain_Services\Response\Domain\Info::get_transfer_lock()Gets the transferlock status.

- `true`: The domain must be unlocked before it can be transferred.
- `false`: The domain does not need to be unlocked before it can be transferred.

* Visibility: **public**
###get_transfer_modestring|null Automattic\Domain_Services\Response\Domain\Info::get_transfer_mode()Gets the transfer mode. One of the following:
- Default: apply the registry policy (usually auto deny)
- `autoapprove`: Automatically approve outbound transfers after 5 days
- `autodeny`: Automatically deny outbound transfers after 5 days



* Visibility: **public**
###get_updated_date\DateTimeInterface|null Automattic\Domain_Services\Response\Domain\Info::get_updated_date()Gets the date that the domain was last updated at the registry.



* Visibility: **public**
###__constructmixed Automattic\Domain_Services\Response\Domain\Info::__construct(array data)`Response` object constructor



* Visibility: **public**#### Arguments*data **array**
###get_data_by_keyarray|mixed|null Automattic\Domain_Services\Response\Domain\Info::get_data_by_key(string key)Returns the response value for the given key, if it exists.



* Visibility: **public**#### Arguments*key **string**
###get_statusint Automattic\Domain_Services\Response\Domain\Info::get_status()Gets the response status code



* Visibility: **public**
###get_status_descriptionstring Automattic\Domain_Services\Response\Domain\Info::get_status_description()Gets the response status description



* Visibility: **public**
###is_successbool Automattic\Domain_Services\Response\Domain\Info::is_success()Gets whether the request succeeded.



* Visibility: **public**
###get_client_txn_idstring Automattic\Domain_Services\Response\Domain\Info::get_client_txn_id()Gets the client transaction ID that was sent with the request. Useful for logging and debugging.



* Visibility: **public**
###get_server_txn_idstring Automattic\Domain_Services\Response\Domain\Info::get_server_txn_id()Gets the server transaction ID that was generated by the Automattic Domain Services back-end for this request.

Useful for logging and debugging.

* Visibility: **public**
###get_timestampint Automattic\Domain_Services\Response\Domain\Info::get_timestamp()Gets the timestamp this response was generated.



* Visibility: **public**
###get_runtimefloat Automattic\Domain_Services\Response\Domain\Info::get_runtime()Gets the runtime (in seconds) the processing of this command took on the back-end.



* Visibility: **public**