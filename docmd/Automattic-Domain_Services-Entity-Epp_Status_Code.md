Automattic\Domain_Services\Entity\Epp_Status_Code
===============A class that represents an EPP status code
* Class name:Epp_Status_Code
* Namespace:\Automattic\Domain_Services\EntityConstants
----------
###CLIENT_DELETE_PROHIBITEDconst CLIENT_DELETE_PROHIBITED = 'clientDeleteProhibited'
###CLIENT_HOLDconst CLIENT_HOLD = 'clientHold'
###CLIENT_RENEW_PROHIBITEDconst CLIENT_RENEW_PROHIBITED = 'clientRenewProhibited'
###CLIENT_TRANSFER_PROHIBITEDconst CLIENT_TRANSFER_PROHIBITED = 'clientTransferProhibited'
###CLIENT_UPDATE_PROHIBITEDconst CLIENT_UPDATE_PROHIBITED = 'clientUpdateProhibited'
###ADD_PERIODconst ADD_PERIOD = 'addPeriod'
###AUTO_RENEW_PERIODconst AUTO_RENEW_PERIOD = 'autoRenewPeriod'
###INACTIVEconst INACTIVE = 'inactive'
###OKconst OK = 'ok'
###PENDING_CREATEconst PENDING_CREATE = 'pendingCreate'
###PENDING_DELETEconst PENDING_DELETE = 'pendingDelete'
###PENDING_RENEWconst PENDING_RENEW = 'pendingRenew'
###PENDING_RESTOREconst PENDING_RESTORE = 'pendingRestore'
###PENDING_TRANSFERconst PENDING_TRANSFER = 'pendingTransfer'
###PENDING_UPDATEconst PENDING_UPDATE = 'pendingUpdate'
###REDEMPTION_PERIODconst REDEMPTION_PERIOD = 'redemptionPeriod'
###RENEW_PERIODconst RENEW_PERIOD = 'renewPeriod'
###SERVER_DELETE_PROHIBITEDconst SERVER_DELETE_PROHIBITED = 'serverDeleteProhibited'
###SERVER_HOLDconst SERVER_HOLD = 'serverHold'
###SERVER_RENEW_PROHIBITEDconst SERVER_RENEW_PROHIBITED = 'serverRenewProhibited'
###SERVER_TRANSFER_PROHIBITEDconst SERVER_TRANSFER_PROHIBITED = 'serverTransferProhibited'
###SERVER_UPDATE_PROHIBITEDconst SERVER_UPDATE_PROHIBITED = 'serverUpdateProhibited'
###TRANSFER_PERIODconst TRANSFER_PERIOD = 'transferPeriod'
###VALID_EPP_STATUSESconst VALID_EPP_STATUSES = [self::CLIENT_DELETE_PROHIBITED => self::READ_WRITE, self::CLIENT_HOLD => self::READ_WRITE, self::CLIENT_RENEW_PROHIBITED => self::READ_WRITE, self::CLIENT_TRANSFER_PROHIBITED => self::READ_WRITE, self::CLIENT_UPDATE_PROHIBITED => self::READ_WRITE, self::ADD_PERIOD => self::READ_ONLY, self::AUTO_RENEW_PERIOD => self::READ_ONLY, self::INACTIVE => self::READ_ONLY, self::OK => self::READ_ONLY, self::PENDING_CREATE => self::READ_ONLY, self::PENDING_DELETE => self::READ_ONLY, self::PENDING_RENEW => self::READ_ONLY, self::PENDING_RESTORE => self::READ_ONLY, self::PENDING_TRANSFER => self::READ_ONLY, self::PENDING_UPDATE => self::READ_ONLY, self::REDEMPTION_PERIOD => self::READ_ONLY, self::RENEW_PERIOD => self::READ_ONLY, self::SERVER_DELETE_PROHIBITED => self::READ_ONLY, self::SERVER_HOLD => self::READ_ONLY, self::SERVER_RENEW_PROHIBITED => self::READ_ONLY, self::SERVER_TRANSFER_PROHIBITED => self::READ_ONLY, self::SERVER_UPDATE_PROHIBITED => self::READ_ONLY, self::TRANSFER_PERIOD => self::READ_ONLY]Methods
-------
###__constructmixed Automattic\Domain_Services\Entity\Epp_Status_Code::__construct(string status)



* Visibility: **public**#### Arguments*status **string**
###__toStringmixed Automattic\Domain_Services\Entity\Epp_Status_Code::__toString()



* Visibility: **public**
###is_updateablemixed Automattic\Domain_Services\Entity\Epp_Status_Code::is_updateable()



* Visibility: **public**